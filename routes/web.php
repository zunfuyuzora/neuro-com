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
})->name('landing');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('/auth/register', 'Auth\RegisterController@register')->name('register');
Route::post('/auth/login', 'Auth\LoginController@login')->name('authorize');
Route::post('/auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/group/{group}/invitation', 'GroupController@invitation')->name('group.invitation');

Route::middleware(['auth'])->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::middleware(['access'])->group(function(){

        Route::put('/group/{group}/addMember', 'GroupController@member')->name('group.newMember');
        Route::delete('/group/{group}/removeMember', 'GroupController@memberRemove')->name('group.removeMember');
    
        Route::resource('/group', 'GroupController')->middleware('auth')->except('edit');
        Route::get('/group/{group}/settings', 'GroupController@edit')->name('group.settings');
        Route::get('/group/{group}/chat', 'GroupController@chat')->name('group.chat');
        
        Route::resource('/board', 'BoardController')->except('create','edit');

        Route::resource('/content', 'ContentController')->except('create');
        Route::get('/mading/{content}', 'ContentController@mading')->name('mading.show');
        Route::get('/task/{content}', 'ContentController@taskShow')->name('task.show');
    });

    Route::post('/comment','CommentController@store')->name('comment.store');

    Route::middleware(['admin'])->group(function (){
        Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
        Route::get('/manage/group/', 'AdminController@group')->name('admin.group');
        Route::get('/manage/group/{group}', 'AdminController@groupDetail')->name('admin.group.detail');
        Route::get('/manage/user/', 'AdminController@user')->name('admin.user');
        Route::get('/manage/user/{user}', 'AdminController@userDetail')->name('admin.user.detail');
    });

});

// ///DONE
// Route::get('/profile', function() {
//     return view('profile');
// });

// ///DONE
// Route::get('/group/slug-name', function() {
//     return view('group');
// });

// ///DONE
// Route::get('/group/slug-name/settings', function() {
//     return view('settings');
// });

// ///DONE
// Route::get('/board/unique-serial', function() {
//     return view('board');
// });

// ///DONE
// Route::get('/task/unique-serial', function() {
//     return view('task');
// });

