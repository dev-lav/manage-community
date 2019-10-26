<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CommunityResource;
use App\Http\Requests\Community\StoreCommunityValidator;
use App\Community;

class CommunityController extends Controller
{
    /**
     * get all comuunity data using pagination
     * @return JSON
     */
     public function index(){
        return $this->apiResponseBuilder(200, Community::paginate());
    }

    /**
     * store new data to database
     * @param  Request $request 
     * @return JSON
     */
    public function create(Request $request, StoreCommunityValidator $validator){
        $data = $request->json()->all();
        $validation = $validator->validate($data);
        if ($validation === true) {
            $newData = Community::create($data);
            return $this->apiResponseBuilder(200,  $newData);
        }
        return $this->apiUnprocessableEntityResponse($validation->all());
    }

    /**
     * show detail data by ID
     * @param  integer $communityId 
     * @return JSON              
     */
    public function show($communityId){
        return $this->apiResponseBuilder(200, Community::find($communityId));
    }

    /**
     * update selected data
     * @param  Request $request     
     * @param  integer  $communityId 
     * @return JSON               
     */
    public function update(Request $request, $communityId){
        $data = $request->json()->all();
        $validator = new StoreCommunityValidator($communityId);
        $validation = $validator->validate($data);
        if ($validation === true) {
            $updatedData = Community::find($communityId)->update($data);
            return $this->apiResponseBuilder(200,  Community::find($communityId));
        }
        return $this->apiUnprocessableEntityResponse($validation->all());
    }

    /**
     * delete selected data
     * @param  [type] $communityId [description]
     * @return [type]              [description]
     */
    public function delete($communityId){
        Community::find($communityId)->delete();
        return response()->json('Data has been deleted');
    }
}
