<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PlanController;

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
//ログイン機能
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
//ログイン状態でアクセス認証
Route::group(['middleware' => ['auth']], function (){
    //ログイン時、ホーム画面
    Route::resource('hotels', 'HotelController');
    Route::resource('plans', 'PlanController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('reservations', 'ReservationController');
    Route::resource('users', 'UserController');
    Route::get('home', 'HotelController@index')->name('home');
    Route::get('reservations/confirm', 'ReservationController@confirm')->name('confirm');
});