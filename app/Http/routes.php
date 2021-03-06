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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 
  array('uses' => 'QuestionsController@index', 'as' => 'home'));
Route::get('register', 
  array('uses' => 'UsersController@create', 'as' => 'register'));
Route::get('login', 
  array('uses' => 'UsersController@login', 'as' => 'login'));
Route::get('logout', 
  array('uses' => 'UsersController@logout', 'as' => 'logout'));
Route::get('question/{id}', 
  array('uses' => 'QuestionsController@question', 'as' => 'question'));
Route::get('your-questions', 
  array(
    'before' => 'auth', 
    'uses' => 'QuestionsController@yourQuestions', 
    'as' => 'yourQuestions'
));
Route::get('question/edit/{id}', 
  array(
    'before' => 'auth', 
    'uses' => 'QuestionsController@edit', 
    'as' => 'editQuestion'
));
Route::get('results/{keyword}', 
  array('uses' => 'QuestionsController@searchResult', 'as' => 'searchResult'));



//POST Routes
Route::post('users', 
  array('uses' => 'UsersController@store', 'as' => 'users'));
Route::post('auth', 
  array('uses' => 'UsersController@auth', 'as' => 'auth'));
Route::post('ask', 
  array('before' => 'auth', 'uses' => 'QuestionsController@create', 'as' => 'ask'));
Route::post('answer', 
  array('before' => 'auth', 'uses' => 'AnswersController@store', 'as' => 'answer'));
Route::post('search', 
  array('uses' => 'QuestionsController@search', 'as' => 'search'));

//PUT methods
Route::put('question/update/{id}', 
  array('before' => 'auth', 'uses' => 'QuestionsController@update', 'as' => 'updateQuestion'));


