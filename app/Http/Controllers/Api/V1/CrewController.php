<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CrewResource;
use App\Http\Requests\Crew\StoreCrewValidator;
use App\Crew;

class CrewController extends Controller
{

    /**
     * get list paginate
     * @return JSON
     */
    public function index(){
    	return $this->apiResponseBuilder(200, Crew::paginate() );
    }

    /**
     * store new data to database
     * @param  Request $request 
     * @return JSON
     */
    public function create(Request $request, StoreCrewValidator $validator){
        $data = $request->json()->all();
        $validation = $validator->validate($data);
        if ($validation === true) {
            $newData = Crew::create($data);
            return $this->apiResponseBuilder(200,  $newData);
        }
        return $this->apiUnprocessableEntityResponse($validation->all());
    }

    /**
     * show detail data
     * @param  int $crewId 
     * @return JSON
     */
    public function show($crewId){
        return $this->apiResponseBuilder(200, Crew::find($crewId));
    }

    /**
     * update selected data
     * @param  Request $request
     * @param  int  $crewId 
     * @return JSON
     */
    public function update(Request $request, $crewId){
        $data = $request->json()->all();
        $validator = new StoreCrewValidator($crewId);
        $validation = $validator->validate($data);
        if ($validation === true) {
            $updatedData = Crew::find($crewId)->update($data);
            return $this->apiResponseBuilder(200,  Crew::find($crewId));
        }
        return $this->apiUnprocessableEntityResponse($validation->all());      
    }

    /**
     * delete selected data
     * @param  int $crewId 
     * @return JSON
     */
    public function delete($crewId){
    	Crew::find($crewId)->delete();
        return response()->json('Data has been deleted');
    }
}
