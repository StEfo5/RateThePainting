<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('welcome');
});

Route::auth();

Route::get('/upload', 'MainController@upload')->name('upload');
Route::post('/upload/intoDB', 'MainController@upload_intoDB');

Route::get('/grade', 'MainController@grade')->name('grade');
Route::post('/grade/decision', 'MainController@grade_decision');

Route::get('/paintings', 'MainController@paintings');

Route::get('/users', 'MainController@users');

Route::get('/profile', 'MainController@profile')->name('profile');
Route::post('/profile/change', 'MainController@profile_change');