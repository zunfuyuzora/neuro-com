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
    return view('landing');
});

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/profile', function() {
    return view('profile');
});

Route::get('/group/slug-name', function() {
    return view('group');
});

Route::get('/group/slug-name/setting', function() {
    return view('setting');
});

Route::get('/board/unique-serial', function() {
    return view('board');
});

Route::get('/task/unique-serial', function() {
    return view('task');
});

Route::get('/task/unique-serial', function() {
    return view('task');
});