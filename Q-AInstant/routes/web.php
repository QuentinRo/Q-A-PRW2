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

// User views ------------------------------------------------
Route::get('/', 'SurveyController@show');

Route::post('/answerSurvey','SurveyController@answer');
// -----------------------------------------------------------

// teacher views -------------------------------------------------
Route::get('/teacher', 'SurveyController@index');
Route::get('/resultSurvey/{id}','SurveyController@results');

Route::get('/addSurvey','SurveyController@createindex');
Route::post('/addSurvey/create','SurveyController@store');

// close and open the survey
Route::get('/openSurvey/{id}','SurveyController@open');
Route::get('/closeSurvey/{id}','SurveyController@close');
//----------------------------------------------------------------


