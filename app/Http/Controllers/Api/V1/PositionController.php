<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PositionResource;
use App\Position;

class PositionController extends Controller
{
    public function getListPosition(){

    	return PositionResource::collection(
    				Position::paginate()
    	);

    }

    public function createPositionData(Request $request){

    	$attibutes = $request->json()->all();

    	Position::create($attibutes);

    	return response( 
    		new PositionResource(
    			Position::latest()->first()), 200
    	);
    }

    public function getPositionById($positionId){

    	return response( 
    		new PositionResource(
    			Position::find($positionId)), 200
    	);
    }

    public function updateSinglePositionData(Request $request, $positionId){

    	$attibutes = $request->json()->all();

    	Position::find($positionId)
    			  ->update($attibutes);

    	return response( 
    		new PositionResource(
    			Position::find($positionId)), 200
    	);
    }

    public function deleteSinglePositionData($positionId){

    	Position::find($positionId)->delete();

    	return response()->json('Has Deleted!');
    }
}
