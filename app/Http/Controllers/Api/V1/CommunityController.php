<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CommunityResource;
use App\Community;

class CommunityController extends Controller
{
     public function getListCommunity(){
    	
        return CommunityResource::collection(
                Community::paginate()
        );
    
    }

    public function createCommunityData(Request $request){

        $data_request = $request->json()->all();

        Community::create($data_request);

        return response(
            new CommunityResource(
                Community::latest()
                ->first()), 200);
    }

    public function getCommunityDataById($communityId){

        return response(
                new CommunityResource(
                 Community::find($communityId),200)
            );
   
    }

    public function updateSingleCommunityData(Request $request, $communityId){

        $attributes = $request->json()->all();

        Community::find($communityId)
                   ->update($attributes);
        
        return response(
                new CommunityResource(
                    Community::find($communityId)), 200
            );
    }

    public function deleteSingleCommunityData($communityId){

        Community::find($communityId)->delete();

        return response()->json('Has deleted!');            

    }

}
