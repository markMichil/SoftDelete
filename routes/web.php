<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
Route::post('product/restore/{id}','ProductController@Restore')->name('product/restore');
Route::post('product/force/{id}','ProductController@Force')->name('product/force');
Route::get('product/aaa','ProductController@Trashed');
//Route::get('product/aaa',[ProductController::class,'Trashed'])->name('product/aaa');
Route::resource('product','ProductController');

