<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CrewResource;
use App\Crew;

class CrewController extends Controller
{

    public function getListCrew(){
    	
    	return CrewResource::collection(
    			     Crew::paginate()
    		);

    }

    public function createCrewData(Request $request){

    	$attributes = $request->json()->all();
    	
    	Crew::create($attributes);

    	return response(
    			new CrewResource(
    				Crew::latest()->first())
    		);
    }

    public function getCrewById($crewId){

        return response(
            new CrewResource(
                    Crew::findOrFail($crewId)
            )
        );
    }

    public function updateSingleCrewData(Request $request, $crewId){

        $attributes = $request->json()->all();
        
        Crew::findOrFail($crewId)
                   ->update($attributes);

        return response(
            new CrewResource(
                Crew::findOrFail($crewId)
            )
        );            
    }

    public function deleteSingleCrewData($crewId){
    	
        Crew::findOrFail($crewId)
                       ->delete();   

        return response()->json("successfully deleted!");

    }
}
