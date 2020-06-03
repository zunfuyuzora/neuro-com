<?php

use GuzzleHttp\Middleware;
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

///DONE
Route::get('/', function () {
    return view('landing');
});

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('/auth/register', 'Auth\RegisterController@register')->name('register');
Route::post('/auth/login', 'Auth\LoginController@login')->name('authorize');
Route::post('/auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', function() {
    return view('home');
})->name('home');

///DONE
Route::get('/profile', function() {
    return view('profile');
});

///DONE
Route::get('/group/slug-name', function() {
    return view('group');
});

///DONE
Route::get('/group/slug-name/settings', function() {
    return view('settings');
});

///DONE
Route::get('/board/unique-serial', function() {
    return view('board');
});

///DONE
Route::get('/task/unique-serial', function() {
    return view('task');
});

