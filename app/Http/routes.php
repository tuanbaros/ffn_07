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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 
    'namespace' => 'Admin'], function() {

    Route::get('/', function() {
        return view('admin.index');
    });

    Route::get('teams/search', [
        'as' => 'admin.teams.search', 
        'uses' => 'TeamsController@search'
    ]);
    
    Route::resource('categories', 'CategoriesController');

    Route::resource('news', 'NewsController');
    
    Route::resource('teams', 'TeamsController');

    Route::resource('league', 'LeagueController');

    Route::resource('league_season', 'LeagueSeasonController');
    
    Route::resource('country', 'CountryController');

    Route::resource('player', 'PlayerController', ['except' => 'show']);

    Route::get('player/search', ['as' => 'admin.player.search', 'uses' => 'PlayerController@search']);

    Route::get('player/filter', ['as' => 'admin.player.filter', 'uses' => 'PlayerController@filter']);

    Route::resource('users', 'UserController', [
        'only' => ['index', 'update', 'destroy']
    ]);

    Route::resource('team_achievement', 'TeamAchievementController');

    Route::resource('position', 'PositionController');
    
    Route::resource('match', 'MatchController', ['except' => 'show']);

    Route::get('match/filter', ['as' => 'admin.match.filter', 'uses' => 'MatchController@filter']);

    Route::resource('rank', 'RankController', ['only' => ['index']]);

    Route::get('rank/filter', ['as' => 'admin.rank.filter', 'uses' => 'RankController@filter']);

    Route::resource('match', 'MatchController');

    Route::resource('player_award', 'PlayerAwardController');

    Route::get('player_award/matchs/{id}', 'PlayerAwardController@getMatch');
    Route::get('player_award/players/{id}', 'PlayerAwardController@getPlayer');
});

Route::auth();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('users', 'UserController', ['only' => [
        'edit', 'update'
    ]]);
});

Route::get('auth/{provider}', [
    'as' => 'provider.redirect',
    'uses' => 'Auth\AuthController@redirectToProvider'
]);

Route::get('auth/{provider}/callback', [
    'as' => 'provider.handle',
    'uses' => 'Auth\AuthController@handleProviderCallback'
]);

Route::group(['namespace' => 'User'], function() {
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::resource('/news','NewsController');
    Route::resource('/news-category', 'NewsCategoryController');
    Route::post('/news/comments', 'NewsController@addComment');
});

Route::get('users/activation/{id}/{token}', [
    'as' => 'users.activation',
    'uses' => 'Auth\AuthController@userActivation'
]);
