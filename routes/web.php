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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

// Users routes
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');

// Pages routes
Route::get('/pages', 'PageController@index')->name('pages.index');
Route::post('/pages', 'PageController@store');
Route::get('/pages/create', 'PageController@create')->name('pages.create');
Route::get('/pages/{page}', 'PageController@show')->name('pages.show');
Route::get('/pages/{page}/edit', 'PageController@edit')->name('pages.edit');
Route::put('/pages/{page}', 'PageController@update');

// Sentences routes
Route::get('/sentences', 'SentenceController@index')->name('sentences.index');
Route::get('/sentences/{sentence}', 'SentenceController@show')->name('sentences.show');

// Annotation routes
Route::get('/annotations', 'AnnotationController@show')->name('annotations.index');
Route::put('/annotations/{sentence}', 'AnnotationController@annotate')->name('annotations.annotate');