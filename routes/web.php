<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'pageController@home');
Route::get('/home', 'pageController@home');
Route::get('/gallery', 'galleryController@listJobs');
Route::get('/jobs/{job}', 'galleryController@showJob');

Auth::routes();
Route::get('/admpanel', 'admController@showPanel');
Route::post('/admpanel/addJob', 'admJobController@addJob');
Route::post('/admpanel/removeJob/{job}', 'admJobController@removeJob');
Route::post('/admpanel/removePics/', 'admJobPicController@removePics');

//Route::post('/cards/{card}/addNotes', 'notesController@addNotes');
//Route::post('/cards/addCard', 'cardsController@addCard');