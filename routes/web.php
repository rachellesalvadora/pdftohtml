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
use Illuminate\Support\Facades\Auth;

if(!Auth::check()){
	Route::get('/', function () {
		return view('auth/login');
	});
} else {
	
	Route::get('/', function () {
		return view('pages/home');
	});

	Route::get('/home', 'HomeController@index')->name('ho†me');
	Route::get('/pdf', 'PdfController@index')->name('pdf');
	Route::get('/letters', 'PdfController@allFiles')->name('allFiles');
	Route::get('/accountdetails', 'AccountDetailsController@index')->name('accountdetails');
	Route::get('/status', 'StatusController@index')->name('status');
	Route::get('/upload', 'UploadController@uploadForm');
	Route::post('/upload', 'UploadController@uploadSubmit');
}
Auth::routes();

Route::get('/database', 'GenerateController@index')->name('database');

