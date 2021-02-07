<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use app\Http\Controllers\auth\LoginController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('product/trashed','ProductController@Trashed');
Route::get('product/{product}','ProductController@show');

Route::post('product/restore/{product}','ProductController@Restore')->name('product/restore');
Route::post('product/force/{product}','ProductController@Force')->name('product/force');
Route::post('product/newImage','ProductController@NewImage')->name('product/newImage');

Route::get('policy', 'ProductController@policy');

Route::resource('product','ProductController');

Route::get('socialLogin','ProductController@Trashed');

Route::post('auth/facebook', 'auth\LoginController@redirectToFacebook')->name('auth/facebook');
Route::get('auth/facebook/callback', 'auth\LoginController@handleFacebookCallback');

Route::post('auth/google', 'auth\LoginController@redirectToGoogle')->name('auth/google');
Route::get('auth/google/callback', 'auth\LoginController@handleGoogleCallback');

