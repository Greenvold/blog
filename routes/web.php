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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::resource('post', 'PostController');
Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
Route::get('/comments/{post}', 'CommentController@fetch');
Route::post('/comment', 'CommentController@store');