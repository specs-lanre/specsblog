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
Route::get("bloghome", [BlogController::class,"ViewallTopics"]);
Route::get("topics", [BlogController::class,"ViewallTopics"]);
Route::get("readmore/{id}", [BlogController::class,"ReadMore"]);
//readmore with ajax
//show comments - ajax
//send comments into db - ajax
Route::get("readmore-ajax/{id}", [BlogController::class,"ReadMore_Ajax"]);
Route::get("showcomments-ajax/{topic_id}", [BlogController::class,"ShowComments_Ajax"]);
Route::get("postcomments-ajax/{data}/{id}", [BlogController::class,"PostComments_Ajax"]);

Route::get("posttopic", [BlogController::class,"PostTopic"]);
Route::post("processposttopic", [BlogController::class,"ProcessPostTopic"]);

//show all posts by the user
Route::get("edituserposts", [BlogController::class,"EditUserPosts"]);

Route::get("editpost/{id}", [BlogController::class,"EditPostForm"]);
Route::post("processeditedposts", [BlogController::class,"ProcessEditPost"]);
Route::get("deletepost/{id}", [BlogController::class,"DeletePost"]);
Route::get("confirmeletepost/{id}", [BlogController::class,"ConfirmDeletePost"]);

Route::get("postcomment/{topic_id}", [BlogController::class,"PostComment"]);
Route::post("doprocesscomment", [BlogController::class,"ProcessComment"]);
Route::get("editcomment/{id}", [BlogController::class,"EditCommentForm"]);
Route::post("doprocesseditcomment", [BlogController::class,"ProcessEditComment"]);

Route::get("loginuser",[SessionController::class,"ShowLoginform"]);
Route::post("dologinuser",[SessionController::class,"LoginUser"]);

Route::get("logoutuser",[SessionController::class,"SignOut"]);

Route::get("registeruser",[RegistrationController::class,"RegisterUser"]);
Route::post("doregisteruser",[RegistrationController::class,"customRegistration"]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
