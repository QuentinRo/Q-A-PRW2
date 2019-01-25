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

Route::get('/', 'SurveyController@show');

Route::get('/addSurvey','SurveyController@createindex');
Route::post('/addSurvey/create','SurveyController@store');

Route::get('/openSurvey/{id}','SurveyController@open');
Route::get('/closeSurvey/{id}','SurveyController@close');

Route::get('/teacher', 'SurveyController@index');

Route::get('/resultSurvey/{id}','SurveyController@results');

Route::post('/answerSurvey','SurveyController@answer');

