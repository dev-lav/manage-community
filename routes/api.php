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
