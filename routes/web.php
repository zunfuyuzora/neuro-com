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
Route::middleware(['guest'])->group(function(){
    
Route::get('/', 'HomeController@landing')->name('landing');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('/auth/register', 'Auth\RegisterController@register')->name('register');
Route::post('/auth/login', 'Auth\LoginController@login')->name('authorize');
});
Route::post('/auth/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/group/{group}/invitation', 'GroupController@invitation')->name('group.invitation');

Route::middleware(['auth'])->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user/{user}', 'ProfileController@userProfile')->name('profile');

    Route::post('/sendMessage', 'MessageController@sendMessage')->name('sendMessage');

    Route::put('/user/{user}/updateData', 'ProfileController@updateData')->name('updateData');
    Route::put('/user/{user}/changePassword', 'ProfileController@changePassword')->name('changePassword');
    Route::put('/user/{user}/changeAvatar', 'ProfileController@changeAvatar')->name('changeAvatar');
    Route::resource('/group', 'GroupController')->except('update','destroy','show');
    Route::post('/group/search','GroupController@search')->name('group.search');
    Route::post('/group/{group}/join','GroupController@joinGroup')->name('group.join');
    Route::get('/group/{group}/guest', 'GroupController@showGuest')->name('group.guest');
    Route::get('/group/{group}/request', 'GroupController@memberRequest')->name('group.request');
    Route::put('/group/{group}/approve', 'GroupController@approval')->name('group.approval');

    Route::post('/upload/{id}/attachment', 'FileController@uploadAttachment')->name('upload.attachment');
    Route::put('/{group}/addMember/invitation', 'GroupController@inviteMember')->name('group.inviteMember');

    Route::middleware(['access'])->group(function(){


        Route::resource('/group', 'GroupController')->except('edit','create','store');
    Route::prefix('/g')->group(function(){
        
        Route::put('/{group}/addMember', 'GroupController@member')->name('group.newMember');
        Route::delete('/{group}/removeMember', 'GroupController@memberRemove')->name('group.removeMember');
        Route::put('/{group}/ugpradeMember', 'GroupController@toModerator')->name('group.upgradeMember');
    
        Route::get('/{group}/settings', 'GroupController@edit')->name('group.settings');
        Route::get('/{group}/chat', 'GroupController@chat')->name('group.chat');
        
        Route::resource('/{group}/board', 'BoardController')->except('create','edit');

        Route::resource('/{group}/content', 'ContentController')->except('create');

        Route::get('/{group}/m/{content}', 'ContentController@mading')->name('mading.show');
        Route::get('/{group}/m/{content}/edit', 'ContentController@madingEdit')->name('mading.edit');
        Route::put('/{group}/m/{content}', 'ContentController@madingUpdate')->name('mading.update');
        Route::put('/{group}/m/{content}/picture', 'ContentController@madingPicture')->name('mading.picture');

        Route::get('/{group}/t/{content}', 'ContentController@taskShow')->name('task.show');
        Route::get('/{group}/t/{content}/edit', 'ContentController@taskEdit')->name('task.edit');
        Route::put('/{group}/t/{content}/update', 'ContentController@taskUpdate')->name('task.update');      

        Route::post('/{group}/module','ContentController@uploadModule')->name('module.upload');
        Route::delete('/{group}/module/','ContentController@removeModule')->name('module.delete');
        
    });
    });

    Route::post('/comment','CommentController@store')->name('comment.store');

    Route::middleware(['admin'])->group(function (){
        Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
        Route::get('/manage/group/', 'AdminController@group')->name('admin.group');
        Route::get('/manage/group/{group}', 'AdminController@groupDetail')->name('admin.group.detail');
        Route::get('/manage/user/', 'AdminController@user')->name('admin.user');
        Route::get('/manage/user/{user}', 'AdminController@userDetail')->name('admin.user.detail');
        Route::get('/admin/{user}', 'AdminController@profile')->name('admin.profile');
        Route::get('/manage/admin','AdminController@create')->name('admin.new.create');
        Route::post('/manage/admin/save', 'AdminController@save')->name('admin.new.save');
    });

});