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

Route::get('/', 'User\PageController@home');
Route::get('/blogs', 'User\PageController@blogs');
Route::get('/blogs/tag/{slug}', 'User\PageController@blogsByTag');
Route::get('/blogs/category/{slug}', 'User\PageController@blogsByCategory');
Route::get('/blog/{slug}', 'User\PageController@blog');
Route::get('/login', 'User\AuthController@showLogin');
Route::post('/login', 'User\AuthController@Login');
Route::get('/register', 'User\AuthController@showRegister');
Route::post('/register', 'User\AuthController@Register');
Route::group(['middleware' => 'RedirectIfNotAuth'], function () {
    Route::get('/logout', 'User\AuthController@Logout');
    Route::get('/profile', 'User\AuthController@userProfile')->name('userProfile');
    Route::post('/updateProfile/{id}', 'User\AuthController@updateProfile')->name('updateProfile');
    Route::post('/changePwd/{id}', 'User\AuthController@changePwd')->name('changePwd');
    Route::post('/blogs/comment', 'User\CommentController@store')->name('storeComment');
    Route::post('/subscribe', 'Admin\SubscribeController@subscribe');
    Route::post('/blog/{slug}/like', 'User\PageController@like')->name('blog.like');
});


//admin route
Route::get('/admin/login', 'Admin\AuthController@showLogin');
Route::post('/admin/login', 'Admin\AuthController@Login');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'RedirectIfNotAdmin'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/dashboard', 'PageController@dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/admins', 'AdminController');
    Route::resource('/users', 'UserController');
    Route::get('/subscribers', 'UserController@subscribers');
    Route::resource('/blogs', 'BlogController');
    Route::get('/profile/{admin}', 'AdminController@showProfile');
});