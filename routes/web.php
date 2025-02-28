<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/feedback', function () {
    return view('feedback');
});
Route::get('/remove', function () {
    return view('remove');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/add', function () {
    $location = app(HelloController::class)->getLocation();
    return view('add', ['city'=>$location[0], 'region'=>$location[1], 'country'=>$location[2]]);
});

Route::post('/register_user', [HelloController::class, 'register_user']);

// /sendfeedbackmail
Route::post('/sendfeedbackmail', [HelloController::class, 'sendfeedbackmail']);


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
}); 
Route::get('/confirmpass', function () {
    return view('confirmpass');
});


// /registeruser
Route::post('/registeruser', [HelloController::class, 'registeruser']);
Route::post('/userlogin', [HelloController::class, 'userlogin']);
Route::post('/userlogout', [HelloController::class, 'userlogout']);
Route::post('/addcity', [HelloController::class, 'addcity']);
Route::post('/removecity', [HelloController::class, 'removecity']);
Route::post('/verifyusername', [HelloController::class, 'forgotpassword']);
Route::post('/verifyotp', [HelloController::class, 'verifyotp']);
Route::post('/changepass', [HelloController::class, 'changepass']);