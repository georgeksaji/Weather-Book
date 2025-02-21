<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class HelloController extends Controller
{
    
public function getLocation()
{
    $ip = Http::get('https://api64.ipify.org?format=json')->json()['ip'];
    $response = Http::get("http://ip-api.com/json/{$ip}");
    $data = $response->json();
    // Ensure keys exist before using them
    $city = $data['city'] ?? 'Unknown City';
    $region = $data['regionName'] ?? 'Unknown Region';
    $country = $data['country'] ?? 'Unknown Country';
    return [$city, $region, $country];
}






}
