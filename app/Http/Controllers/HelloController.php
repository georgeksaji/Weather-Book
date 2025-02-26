<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\WbUser;
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
        Mail::raw($email, function ($message) {
            $message->to('mca2426@rajagiri.edu')
                ->from('georgeksaji14@gmail.com', 'Weather Book') // Add sender details
                ->subject('Weather Book Feedback');
        });
        return view('feedback');
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
    // Validate the request
    $validator = Validator::make($request->all(), [
        'username' => 'required|string', // Remove 'email' if username is not an email
        'password' => 'required|string|min:5',
    ]);
    // Check for validation errors
    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator) // Pass validation errors to the view
                         ->withInput(); // Repopulate the form with old input
    }
    // Retrieve the user by username
    $user = WbUser::where('username', $request->username)->first();
    // Check if the user exists, is active, and the password is correct
    if ($user && $user->status === 'active' && Hash::check($request->password, $user->password)) {
        // Log in the user
        Auth::login($user);
        session([
            'userid' => $user->id,
            'role' => $user->role,
            'username' => $user->username,
        ]);
        // Regenerate the session ID for security
        $request->session()->regenerate();
        // Redirect to the home page
        return redirect('/home');
    } else {
        // Authentication failed
        return redirect()->back()
                         ->with('error', 'Username or password is incorrect, or account is inactive')
                         ->withInput();
    }
}

//userlogout
public function userlogout(Request $request)
{
    // Retrieve the user by username from session

    $user = WbUser::where('username', $request->username)->first(); 
    // Log out the user
    Auth::logout();
    // Invalidate the session
    $request->session()->invalidate();
    // Regenerate the CSRF token
    $request->session()->regenerateToken();
    // Redirect to the home page
    return redirect('/');

}
}