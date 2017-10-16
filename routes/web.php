<?php

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
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin'] ], function() {
    // categories routes
    Route::resource('categories','CategoryController');
    //Books-related routes
    Route::resource('books', 'BookController', ['only' => ['index', 'create', 'store']]);
    Route::get('/books/{book}/edit', 'BookController@edit');
    Route::put('/books/{book}', 'BookController@update');
    Route::delete('/books/{book}', 'BookController@destroy');
    //Members-related routes
    Route::resource('members', 'UserController', ['only' => ['index', 'create', 'store']]);
    Route::get('/members/{user}/edit', 'UserController@edit');
    Route::put('/members/{user}', 'UserController@update');
    Route::delete('/members/{user}', 'UserController@destroy');
    //Report-related routes
    Route::get('report', 'ReportController@index');
});