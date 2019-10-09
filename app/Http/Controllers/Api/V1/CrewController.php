<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CrewResource;
use App\Crew;

class CrewController extends Controller
{
    private $crew;

    public function __construct(Crew $crew)
    {
        $this->crew = $crew;
    }

    public function getListCrew(){
    	
    	return CrewResource::collection(
    			$this->crew->paginate()
    		);

    }

    public function createCrewData(Request $request){

    	$attributes = $request->json()->all();
    	
    	$this->crew->create($attributes);

    	return response(
    			new CrewResource(
    				$this->crew
                    ->latest()->first())
    		);
    }

    public function getCrewById($crewId){

        return response(
            new CrewResource(
                $this->crew->find($crewId)
            )
        );
    }

    public function updateSingleCrewData(Request $request, $crewId){

        $attributes = $request->json()->all();
        
        $this->crew->findOrFail($crewId)
                   ->update($attributes);

        return response(
            new CrewResource(
                $this->crew->find($crewId)
            )
        );            
    }

    public function deleteSingleCrewData($crewId){
    	
        $this->crew->findOrFail($crewId)
                   ->delete();   

        return response()->json("successfully deleted!");

    }
}
