<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalPageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@getPosts');
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@getPosts')->name('home');
    Route::post('/home/{id}/delete', 'PostController@deletePosts')->name('delete');
    Route::get('/home/{id}/edit', 'PostController@editPost')->name('edit');
    Route::post('/edit/{id}', 'PostController@updatePost')->name('update');
    Route::post('/home', 'PostController@store')->name('create_posts');
    Route::post('/get-list-images', 'PostController@getListImages');
    Route::get('/personal_page', function () {
        return view('personalPage');
    })->name('personal_page');
    Route::get('/personal_page', 'PersonalController@index')->name('personal_page');
    Route::get('/personal_page/{id}', 'PersonalController@index')->name('personal');
});

// Route::get('/home', 'HomeController@index')->name('home');

// routes/web.php
// Route::post('/upload', 'FileController@upload')->name('uploadFiles');
