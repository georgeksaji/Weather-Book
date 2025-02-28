<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\WbUser;
use App\Models\WbCity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HelloController extends Controller
{
    public function register_user(Request $request)
    {
        $email = 'georgeksaji14@gmail.com';
        $apiKey = '3da0c956-3fdb-4f7a-8a2a-c1ad09f8ae40';
        $url = 'https://api.mails.so/v1/validate?email=' . $email;
        $options = [
            'http' => [
                'header' => "x-mails-api-key: $apiKey",
                'method' => 'POST'
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        if ($response === FALSE) {
            die('Error');
        }
        $data = json_decode($response, true);
        print_r($data);
        return $response->json();
    }

    public function getLocation()
    {
        $ip = Http::get('https://api64.ipify.org?format=json')->json()['ip'];
        $response = Http::get("http://ip-api.com/json/{$ip}");
        $data = $response->json();
        // Ensure key values are set
        $city = $data['city'] ?? 'Unknown City';
        $region = $data['regionName'] ?? 'Unknown Region';
        $country = $data['country'] ?? 'Unknown Country';
        return [$city, $region, $country];
    }

    // /sendfeedbackmail
    public function sendfeedbackmail(Request $request)
    {
        $email = $request->feedback;
        if (empty($email)) {
            return redirect()->back()->with('error', 'Feedback is empty');
        }
        try {
            Mail::raw($email, function ($message) {
                $message->to('mca2426@rajagiri.edu')
                    ->from('georgeksaji14@gmail.com', 'Weather Book') // Add sender details
                    ->subject('Weather Book Feedback');
            });
            return redirect()->back()->with('success', 'Feedback mail sent successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Feedback mail failed. Try again later.');
        }
    }

    // registeruser
    public function registeruser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:wb_user',
            'dob' => 'required|date|before_or_equal:today',
            'phone' => 'required|string|unique:wb_user',
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:5|confirmed',
        ]);

        // Check for specific field errors
        if ($validator->errors()->has('username')) {
            return redirect()->back()
                ->with('error', 'Username already exists or invalid')
                ->withInput();
        }
        if ($validator->errors()->has('dob')) {
            return redirect()->back()
                ->with('error', 'Date of birth is invalid')
                ->withInput();
        }
        if ($validator->errors()->has('phone')) {
            return redirect()->back()
                ->with('error', 'Phone number already exists or invalid')
                ->withInput();
        }
        if ($validator->errors()->has('location')) {
            return redirect()->back()
                ->with('error', 'Location is invalid')
                ->withInput();
        }
        if ($validator->errors()->has('password')) {
            return redirect()->back()
                ->with('error', 'Password is invalid')
                ->withInput();
        }
        // General validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors to the view
                ->withInput();
        }
        try {
            $user = new WbUser;
            $user->username = strtolower($request->username);
            $user->dob = $request->dob;
            $user->phone = $request->phone;
            $user->location = $request->location;
            $user->password = Hash::make($request->password);
            $user->role = $request->role ?? 'user'; // Default role
            $user->save();

            return redirect()->back()->with('success', 'Registration success. Login with your credentials.');
        } catch (\Exception $e) {
            \Log::error('Registration failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Registration failed. Try again later.')->withInput();
        }
    }


    // /userlogin
    public function userlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|email',
            'password' => 'required|string|min:5',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = WbUser::where('username', $request->username)->first();
        if ($user && $user->status === 'active' && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            //fetch cities for the user
            $cities = WbCity::where('user_id', $user->id)->get();
            if ($cities->count() > 0) {
                session([
                    'userid' => $user->id,
                    'role' => $user->role,
                    'username' => $user->username,
                    'cities' => $cities,
                ]);
            } else {
                session([
                    'userid' => $user->id,
                    'role' => $user->role,
                    'username' => $user->username,
                ]);
            }
            $request->session()->regenerate();
            return redirect('/home');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Username or password is incorrect, or account is inactive')->withInput();
        }

    }

    //userlogout
    public function userlogout(Request $request)
    {
        // Log out the user
        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate the CSRF token
        $request->session()->regenerateToken();
        // Redirect to the home page
        return redirect('/');

    }


    public function addcity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            if (WbCity::where('city_name', $request->city)->where('country_name', $request->country)->where('user_id', session('userid'))->exists()) {
                return redirect()->back()->with('error', 'City already exists')->withInput();
            }
            $city = new WbCity;
            $city->city_name = $request->city;
            $city->country_name = $request->country;
            $city->user_id = session('userid');
            $city->save();

            session()->put('cities', WbCity::where('user_id', session('userid'))->get());
            //return home
            return redirect()->back()->with('success', 'City added successfully');
        } catch (\Exception $e) {
            \Log::error('City addition failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'City addition failed. Try again later.')->withInput();
        }
    }

    public function removecity(Request $request)
    {
        $city = $request->input('city_name');
        $city = WbCity::where('city_name', $city)->where('user_id', session('userid'))->first();
        if ($city) {
            $city->delete();

            session()->put('cities', WbCity::where('user_id', session('userid'))->get());
            return redirect()->back()->with('success', 'City removed successfully');
        } else {
            return redirect()->back()->with('error', 'City removal failed. Try again later.');
        }
    }

    public function forgotpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error','Invalid username')->withInput();
        }
        $user = WbUser::where('username', $request->username)->first();
        if ($user) {
            $random = rand(1000, 9999);
            $user->otp = Hash::make($random);
            $user->otp_expiry = now()->addMinutes(1);
            $user->is_verified = false;
            $user->save();
            try {
                Mail::raw("Hi, greetings from WeatherBook! Your OTP to reset your password is $random. Verify your OTP in 1 minute.", function ($message) use ($user) {
                    $message->to($user->username)
                    ->from('georgeksaji14@gmail.com', 'Weather Book') // Add sender details
                    ->subject('Reset Password OTP');
                });
                return redirect()->back()->with('success','OTP sent to your email. Verify in 1 minute.',)->with('status','otp')->withInput();
            } catch (\Exception $e) {
                return redirect()->back()->with('error','OTP sending failed')->withInput();
            }
        } else {
            return redirect()->back()->with('error','Username not found')->withInput();
        }
}

public function verifyotp(Request $request)
{
    $validator = Validator::make($request->all(), [
        'otp' => 'required|string|min:4|max:4',
    ]);
    if ($validator->fails()) {
        return redirect()->back()->with('error','Invalid OTP')->withInput();
    }
    $user = WbUser::where('username', $request->username)->first();
    if ($user) {
        if (Hash::check($request->otp, $user->otp) && $user->otp_expiry > now() && !$user->is_verified) {
            return redirect()->back()->with('success','OTP verified successfully')->with('verified','otp')->withInput();
        } else {
            return redirect()->back()->with('error','OTP verification failed')->withInput();
        }
    } else {
        return redirect()->back()->with('error','Username not found')->withInput();
    }
}
public function changepass(Request $request)
{
    $validator = Validator::make($request->all(), [
        'password' => 'required|string|min:5|confirmed',
    ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $user = WbUser::where('username', $request->username)->first();
    if ($user && !$user->is_verified) {
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_expiry = null;
        $user->is_verified = true;
        $user->save();
        return redirect()->back()->with('success','Password changed successfully')->withInput();
    } else {
        return redirect()->back()->with('error','Password change failed')->withInput();
    }

}
}