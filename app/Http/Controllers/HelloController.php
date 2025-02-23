<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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
}