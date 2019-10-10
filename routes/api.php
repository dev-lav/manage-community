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

});
