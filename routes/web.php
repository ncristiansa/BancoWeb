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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get('/', 'Auth\LoginController@login')->name('login');
Route::post('/check', 'Auth\LoginController@checkUser')->name('check');
Route::get('/register', 'Auth\LoginController@register')->name('register');
Route::post('/register/save', 'Auth\LoginController@store')->name('store');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/save', 'HomeController@storeData')->name('storeData');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
