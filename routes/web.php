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

Auth::routes();
//home
Route::get('/', 'pageController@home');
Route::get('/home', 'pageController@home');
Route::post('/contactForm', 'pageController@contactForm');

//privacy policy
Route::get('/privacyPolicy', 'pageController@privacyPolicy');

//gallery
Route::get('/gallery', 'galleryController@listJobs');
Route::get('/jobs/{job}', 'galleryController@showJob');
Route::get('/admpanel', 'admController@showPanel');
Route::post('/admpanel/addJob', 'admJobController@addJob');
Route::post('/admpanel/removeJob/{job}', 'admJobController@removeJob');
Route::post('/admpanel/addPic/', 'admJobPicController@addPic');
Route::post('/admpanel/removePics/', 'admJobPicController@removePics');
Route::patch('/admpanel/editJobHeading/{job}', 'admJobController@editHeading');
Route::patch('/admpanel/editJobDescription/{job}', 'admJobController@editDescription');

//ratings
Route::get('/ratings', 'ratingController@listRatings');
Route::post('/ratings/addRating', 'ratingController@addRating');
Route::patch('/admpanel/verifyRating/{rating}', 'admRatingController@verifyRating');
Route::post('/admpanel/removeRating/{rating}', 'admRatingController@removeRating');
