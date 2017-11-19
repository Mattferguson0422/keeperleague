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


// League Routes
Route::get('leagues/join','LeaguesController@join');
Route::resource('leagues', 'LeaguesController');
Route::delete("leagues/{league}/leave", 'LeaguesController@leave');
Route::post("leagues/join",'LeaguesController@joinLeague');

//Draft Routes
//Route::get('/drafts/{draft}', 'DraftsController@show');
Route::resource('drafts', 'DraftsController');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));


// Results
//Route::get('/results', 'ResultsController@index');
Route::patch('/drafts/{draft}/results', 'ResultsController@update');
