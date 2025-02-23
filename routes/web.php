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
    $location = app(HelloController::class)->getLocation();
    return view('home', ['city'=>$location[0], 'region'=>$location[1], 'country'=>$location[2]]);
});
Route::get('/add', function () {
    $location = app(HelloController::class)->getLocation();
    return view('add', ['city'=>$location[0], 'region'=>$location[1], 'country'=>$location[2]]);
});

Route::post('/register_user', [HelloController::class, 'register_user']);