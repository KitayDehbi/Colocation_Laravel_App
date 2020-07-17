<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/offer', 'offerController@index');
Route::get('/userOffer', 'offerController@userOffer');
Route::get('/request', 'RequestController@index');
Route::get('/userRequest', 'RequestController@userRequest');
Route::post('/addOffer', 'offerController@addOffer');
Route::post('/addRequest', 'RequestController@addRequest');
Route::get('/offer/{id}', 'offerController@showOffer');
Route::get('/request/{id}', 'RequestController@showRequest');
Route::post('/offer/delete/{id}', 'offerController@deleteOffer');
Route::post('/request/delete/{id}', 'RequestController@deleteRequest');