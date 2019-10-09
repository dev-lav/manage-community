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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function(){


		Route::get('communities', 
			'Api\V1\CommunityController@getListCommunity'
		);
		Route::post('communities',
			'Api\V1\CommunityController@createCommunityData'
		);
		Route::get('communities/{communityId}',
			'Api\V1\CommunityController@getCommunityDataById'
		);
		Route::put('communities/{communityId}',
			'Api\V1\CommunityController@updateSingleCommunityData'
		);
		Route::delete('CommunityController/{communityId}',
			'Api\V1\PositionController@deleteSingleCommunityData'
		);


		Route::get('positions', 
			'Api\V1\PositionController@getListPosition'
		);
		Route::post('positions',
			'Api\V1\PositionController@createPositionData'
		);
		Route::get('positions/{positionId}',
			'Api\V1\PositionController@getPositionById'
		);
		Route::put('positions/{positionId}',
			'Api\V1\PositionController@updateSinglePositionData'
		);
		Route::delete('positions/{positionId}',
			'Api\V1\PositionController@deleteSinglePositionData'
		);


		Route::get('crews', 
		'Api\V1\CrewController@getListCrew'
		);
		Route::post('crews',
			'Api\V1\CrewController@createCrewData'
		);
		Route::get('crews/{crewId}',
			'Api\V1\CrewController@getCrewById'
		);
		Route::put('crews/{crewId}',
			'Api\V1\CrewController@updateSingleCrewData'
		);
		Route::delete('crews/{crewId}',
			'Api\V1\CrewController@deleteSingleCrewData'

                  
		Route::get('events', 
			'Api\V1\EventController@getListEvent'
		);
		Route::post('events',
			'Api\V1\EventController@createEventData'
		);
		Route::get('events/{eventId}',
			'Api\V1\EventController@getEventById'
		);
		Route::put('events/{eventId}',
			'Api\V1\EventController@updateSingleEventData'
		);
		Route::delete('events/{eventId}',
			'Api\V1\EventController@deleteSingleEventData'
		);


		Route::get('eventpartners', 
			'Api\V1\EventPartnerController@getListEventPartner'
		);
		Route::post('eventpartners',
			'Api\V1\EventPartnerController@createEventPartnerData'
		);
		Route::get('eventpartners/{eventId}',
			'Api\V1\EventPartnerController@getEventPartnerById'
		);
		Route::put('eventpartners/{eventId}',
			'Api\V1\EventPartnerController@updateSingleEventPartnerData'
		);
		Route::delete('eventpartners/{eventId}',
			'Api\V1\EventPartnerController@deleteSingleEventPartnerData'
		);

		Route::apiResource('venues', 'Api\V1\VenueController');

		Route::apiResource('partners', 'Api\V1\PartnerController');
});
