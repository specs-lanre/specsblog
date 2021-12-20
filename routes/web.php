<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
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

// Route::get('/', function () {
    // return view('welcome');
// });
 Route::get('/', function () {
    return view('specs-blog.welcome');
 });
Route::get("home", [BlogController::class,"ViewallTopics"]);
Route::get("topics", [BlogController::class,"ViewallTopics"]);
Route::get("readtopic/{topicid}", [BlogController::class,"ReadTopic"]);
Route::get("posttopic", [BlogController::class,"PostTopic"]);
Route::get("processposttopic", [BlogController::class,"ProcessPostTopic"]);

Route::get("registeruser",[RegistrationController::class,"RegisterUser"]);
Route::post("registeruser",[RegistrationController::class,"PostRegisterUser"]);

Route::get("loginuser",[SessionController::class,"LoginUser"]);
Route::get("logoutuser",[SessionController::class,"SignOut"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
