<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PositionResource;
use App\Http\Requests\Position\StorePositionValidator;
use App\Position;

class PositionController extends Controller
{
    /**
     * display position data
     * @return JSON
     */
    public function index(){
        return $this->apiResponseBuilder(200, Position::paginate());
    }

    /**
     * store new position data
     * @param  Request                $request   
     * @param  StorePositionValidator $validator 
     * @return  JSON
     */
    public function create(Request $request, StorePositionValidator $validator){
        $data = $request->json()->all();
        $validation = $validator->validate($data);
        if ($validation === true) {
            $newData = Position::create($data);
            return $this->apiResponseBuilder(200,  $newData);
        }
        return $this->apiUnprocessableEntityResponse($validation->all());
    }

    /**
     * display selected position data
     * @param  int $Position 
     * @return JSON
     */
    public function show($Position){
        return $this->apiResponseBuilder(200, Position::find($Position));
    }

    /**
     * update selected position data
     * @param  Request $request    
     * @param  int  $positionId 
     * @return JSON
     */
    public function update(Request $request, $positionId){
        $data = $request->json()->all();
        $validator = new StorePositionValidator($positionId);
        $validation = $validator->validate($data);
        if ($validation === true) {
            $updatedData = Position::find($positionId)->update($data);
            return $this->apiResponseBuilder(200,  Position::find($positionId));
        }
        return $this->apiUnprocessableEntityResponse($validation->all());
    }

    public function deleteSinglePositionData($positionId){

    	Position::find($positionId)->delete();

    	return response()->json('Has Deleted!');
    }
}
