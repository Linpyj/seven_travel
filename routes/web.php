<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
//ログイン状態でアクセス認証
Route::group(['middleware' => ['auth']], function (){
    Route::get('home', 'HotelController@index')->name('home');
    Route::resource('hotels', 'HotelController');
});
Route::get('/', 'PlanController@index');
Route::resource('plans', 'PlanController');
Route::post('plans/index', 'PlanController@index')->name('index');