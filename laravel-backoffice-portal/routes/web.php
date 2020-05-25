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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('messages', 'MessageController');
Route::post('/messages/create','MessageController@store');
Route::put('/messages/{message}','MessageController@update');
// Route::get('/messages/{message}','MessageController@show');
// Route::delete('/messages/{message}','MessageController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
