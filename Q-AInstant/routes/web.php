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

Route::get('/inscription', function (){
   return view('inscription');
});

// Route::get('/inscription', 'InscriptionController@index');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('/login', 'Auth\LoginController@login');

//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');

//Auth::routes();
//Route::get('/login', 'Auth\LoginController@showLoginForm');

// name the root to use it
Route::get('/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::get('/register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@showRegisterForm']);

Route::get('/verification', [ 'as' => 'verification', 'uses' => 'Auth\VerificationController@showVerificationForm']);
//Route::get('/login', [ 'as' => 'login', 'uses' => 'Auth\RegisterController@showLoginForm']);

Route::get('/home', 'HomeController@index')->name('home');
