<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin', 'namespace' => 'Api'], function() {
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