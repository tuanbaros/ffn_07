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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', function() {
    return view('user.home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::get('/', function() {
        return view('admin.index');
    });

    Route::get('teams/search', ['as' => 'admin.teams.search', 
      'uses' => 'TeamsController@search']);
    
    Route::resource('categories', 'CategoriesController');

    Route::resource('news', 'NewsController');
    
    Route::resource('teams', 'TeamsController');

    Route::resource('league', 'LeagueController');
    
    Route::resource('country', 'CountryController');
});

Route::auth();

Route::get('/home', 'HomeController@index');
