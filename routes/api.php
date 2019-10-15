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


		Route::get('programs', 
			'Api\V1\ProgramController@getListProgram'
		);
		Route::post('programs',
			'Api\V1\ProgramController@createProgramData'
		);
		Route::get('programs/{programId}',
			'Api\V1\ProgramController@getProgramById'
		);
		Route::put('programs/{programId}',
			'Api\V1\ProgramController@updateSingleProgramData'
		);
		Route::delete('programs/{programId}',
			'Api\V1\ProgramController@deleteSingleProgramData'
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
		);

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api\V1'
], function () {
    Route::get('communities', 'CommunityController@getListCommunity');
    Route::post('communities', 'CommunityController@createCommunityData');
    Route::get('communities/{communityId}', 'CommunityController@getCommunityDataById');
    Route::put('communities/{communityId}', 'CommunityController@updateSingleCommunityData');
    Route::delete('CommunityController/{communityId}', 'PositionController@deleteSingleCommunityData');

    Route::get('positions', 'PositionController@getListPosition');
    Route::post('positions', 'PositionController@createPositionData');
    Route::get('positions/{positionId}', 'PositionController@getPositionById');
    Route::put('positions/{positionId}', 'PositionController@updateSinglePositionData');
    Route::delete('positions/{positionId}', 'PositionController@deleteSinglePositionData');

    Route::get('crews', 'CrewController@getListCrew');
    Route::post('crews', 'CrewController@createCrewData');
    Route::get('crews/{crewId}', 'CrewController@getCrewById');
    Route::put('crews/{crewId}', 'CrewController@updateSingleCrewData');
    Route::delete('crews/{crewId}', 'CrewController@deleteSingleCrewData');

    Route::get('eventpartners', 'EventPartnerController@getListEventPartner');
    Route::post('eventpartners', 'EventPartnerController@createEventPartnerData');
    Route::get('eventpartners/{eventId}', 'EventPartnerController@getEventPartnerById');
    Route::put('eventpartners/{eventId}', 'EventPartnerController@updateSingleEventPartnerData');
    Route::delete('eventpartners/{eventId}', 'EventPartnerController@deleteSingleEventPartnerData');

    Route::get('events', 'EventController@getListEvent');
    Route::post('events', 'EventController@createEventData');
    Route::get('events/{eventId}', 'EventController@getEventById');
    Route::put('events/{eventId}', 'EventController@updateSingleEventData');
    Route::delete('events/{eventId}', 'EventController@deleteSingleEventData');

    Route::apiResource('venues', 'VenueController');

    Route::apiResource('partners', 'PartnerController');
});
