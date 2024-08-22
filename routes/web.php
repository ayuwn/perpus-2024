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

	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

	Route::group(['middleware'=>['auth']],function(){
		Route::get('/admin','App\Http\Controllers\AdminController@index');

		Route::get('/admin/user','App\Http\Controllers\UserController@index'); // ini rute untuk index (menampilkan semua data)
		Route::get('/admin/user/{id}/show','App\Http\Controllers\UserController@show'); // ini rute untuk detail per user
		Route::get('/admin/user/create','App\Http\Controllers\UserController@create'); // ini rute untuk create (tampilan menambah user baru)
		Route::post('/admin/user/store','App\Http\Controllers\UserController@store'); // ini rute untuk store (proses nambah user)
		Route::get('/admin/user/{id}/edit','App\Http\Controllers\UserController@edit'); // ini rute untuk edit user
		Route::post('/admin/user/{id}/update','App\Http\Controllers\UserController@update'); // ini rute untuk proses update
		Route::get('/admin/user/{id}/delete','App\Http\Controllers\UserController@destroy'); // ini rute untuk delete user

		Route::get('/admin/book', 'App\Http\Controllers\BookController@index');
		Route::get('/admin/book/{id}/show','App\Http\Controllers\BookController@show');
		Route::get('/admin/book/create','App\Http\Controllers\BookController@create');
		Route::post('/admin/book/store','App\Http\Controllers\BookController@store');
		Route::get('/admin/book/{id}/edit','App\Http\Controllers\BookController@edit');
		Route::post('/admin/book/{id}/update','App\Http\Controllers\BookController@update');
		Route::get('/admin/book/{id}/delete', 'App\Http\Controllers\BookController@destroy');
		Route::get('/admin/rent','App\Http\Controllers\RentController@index');

	});

	Route::group(['middleware'=>'auth'],function(){
		Route::get('/library','LibraryController@index');
		Route::get('/library/search','LibraryController@search');

		Route::get('/listrent','ListRentController@index');
		Route::get('/listrent/{id}/rent','ListRentController@rent');
		Route::get('/listrent/{id}/return','ListRentController@return');
		
		Route::get('/profile','ProfileController@index');
	});

	Auth::routes();

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/library', 'App\Http\Controllers\LibraryController@index');
	Route::get('/listrent', 'App\Http\Controllers\ListRentController@index');
	Route::get('/listrent/{id}/rent', 'App\Http\Controllers\ListRentController@index');
	Route::get('/profile', 'App\Http\Controllers\ProfileController@index');