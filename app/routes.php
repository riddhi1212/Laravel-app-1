<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	$found_people_list = FoundPeople::orderBy('created_at','dsc')->get();
// 	$find_people_list = FindPeople::orderBy('created_at','dsc')->get();
// 	return View::make('home',[ 'found_people_list' => $found_people_list, 
// 							   'find_people_list' => $find_people_list  
// 							 ]);
// });

Route::get('/', array(
    'as' => 'home',
    'uses' => function()
				{
					$found_people_list = FoundPeople::orderBy('created_at','dsc')->get();
					$find_people_list = FindPeople::orderBy('created_at','dsc')->get();
					return View::make('home',[ 'found_people_list' => $found_people_list, 
											   'find_people_list' => $find_people_list  
											 ]);
				}
) );

Route::post('/find', array(
    'as' => 'find.people.create',
    'uses' => 'FindPeopleController@create'
) );

Route::post('/found', array(
    'as' => 'found.people.create',
    'uses' => 'FoundPeopleController@create'
) );

Route::get('/updates', array(
    'as' => 'updates',
    'uses' => function()
				{
					$army_updates_list = ArmyUpdates::orderBy('s-no','asc')->get();
					return View::make('armyupdates',[ 'army_updates_list' => $army_updates_list ]);
				}
) );

Route::post('/updates', array(
    'as' => 'army.updates.search',
    'uses' => 'ArmyUpdatesController@search'
) );

// Route::get('/updates', function()
// {
// 	$army_updates_list = ArmyUpdates::orderBy('s-no','asc')->get();
// 	return View::make('armyupdates',[ 'army_updates_list' => $army_updates_list ]);
// });

// ================= playing with code =================

// Route::get('/nav', function()
// {
// 	return View::make('navhome');
// });

Route::get('/tabs', function()
{
	return View::make('tabbedhome');
});

// ================= debugging helpers =================

Route::get('/laravel', function()
{
	return View::make('hello');
});

Route::get('/env', function()
{
	var_dump( App::environment() );
	return;
});

Route::get('/env-all', function()
{
	var_dump($_SERVER); // array of all php server vars
	return;
});

Route::get('/hostname', function()
{
	var_dump( gethostname() );
});

Route::get('/dbtest', function()
{
	$findPeople = DB::table('find-people')->get();
	return $findPeople;
});