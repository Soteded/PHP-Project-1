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

Route::get('/presentation', function () {
    return view('presentation');
})->name('presentation');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/autres', function () {
    return view('autres');
})->name('others');

Auth::routes();

Route::get('/Administrator', 'AdministratorController@index')->name('Administrator')->middleware('auth','role:Administrator');
Route::get('/Moderator', 'ModeratorController@index')->name('Moderator')->middleware('auth','role:Moderator');
Route::get('/User', 'UserController@index')->name('User')->middleware('auth','role:User');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profiles', 'ProfileController');

Route::get('/profiles', 'ProfileController@index')->name('index')->middleware('auth','role:Administrator');

Route::get('/show/{id}', 'ProfileController@show')->name('show2')->middleware('auth','role:Administrator');
Route::get('/show', 'ProfileController@show2')->name('show');

Route::get('/edit/{id}', 'ProfileController@edit2')->name('edit2');
Route::get('/edit', 'ProfileController@edit')->name('edit');
