<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function(){

	Route::group(['prefix' => 'communities'], function(){
		Route::get('/', 'Api\V1\CommunityController@index');
		Route::post('/','Api\V1\CommunityController@create');
		Route::get('{communityId}','Api\V1\CommunityController@show');
		Route::put('{communityId}','Api\V1\CommunityController@update');
		Route::delete('{communityId}','Api\V1\PositionController@delete');
	});
	Route::group(['prefix' => 'positions'], function(){
		Route::get('/', 'Api\V1\PositionController@getListPosition');
		Route::post('/','Api\V1\PositionController@createPositionData');
		Route::get('{positionId}','Api\V1\PositionController@getPositionById');
		Route::put('{positionId}','Api\V1\PositionController@updateSinglePositionData');
		Route::delete('{positionId}','Api\V1\PositionController@deleteSinglePositionData');
	});

	Route::group(['prefix' => 'events'], function(){
		Route::get('/', 'Api\V1\EventController@getListEvent');
		Route::post('/','Api\V1\EventController@createEventData');
		Route::get('{eventId}', 'Api\V1\EventController@getEventById');
		Route::put('{eventId}', 'Api\V1\EventController@updateSingleEventData');
		Route::delete('{eventId}', 'Api\V1\EventController@deleteSingleEventData');
	});
	Route::group(['prefix' => 'eventpartners'], function(){
		Route::get('/', 'Api\V1\EventPartnerController@getListEventPartner');
		Route::post('/', 'Api\V1\EventPartnerController@createEventPartnerData');
		Route::get('{eventId}', 'Api\V1\EventPartnerController@getEventPartnerById');
		Route::put('{eventId}', 'Api\V1\EventPartnerController@updateSingleEventPartnerData');
		Route::delete('{eventId}', 'Api\V1\EventPartnerController@deleteSingleEventPartnerData');
	});

	Route::group(['prefix' => 'programs'], function(){
		Route::get('/', 'Api\V1\ProgramController@getListProgram');
		Route::post('/', 'Api\V1\ProgramController@createProgramData');
		Route::get('{programId}', 'Api\V1\ProgramController@getProgramById');
		Route::put('{programId}', 'Api\V1\ProgramController@updateSingleProgramData');
		Route::delete('{programId}', 'Api\V1\ProgramController@deleteSingleProgramData');
	});

	Route::group(['prefix' => 'crews'], function(){
		Route::get('/', 'Api\V1\CrewController@index');
		Route::post('/','Api\V1\CrewController@create');
		Route::get('{crewId}', 'Api\V1\CrewController@show');
		Route::put('{crewId}', 'Api\V1\CrewController@update');
		Route::delete('{crewId}', 'Api\V1\CrewController@delete');
	});

	Route::apiResource('venues', 'Api\V1\VenueController');
    Route::apiResource('partners', 'Api\V1\PartnerController');

});
