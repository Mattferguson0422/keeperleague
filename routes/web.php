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

Route::get('/dashboard', 'HomeController@index')->name('home');
//Route::post('/leagues', 'LeaguesController@store');

// League Routes
Route::get('/leagues', 'LeaguesController@index');
Route::get('/leagues/{league}', 'LeaguesController@show');

//Draft Routes
Route::get('/drafts/{draft}', 'DraftsController@show');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));


// Results
//Route::get('/results', 'ResultsController@index');
Route::patch('/drafts/{draft}/results', 'ResultsController@update');
