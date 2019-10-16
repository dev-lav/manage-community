<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CommunityResource;
use Illuminate\Support\Facades\Validator;
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

        $this->validator($data_request)->validate();

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

        $this->validator($attributes)->validate();

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

    public function validator(array $data)
    {
        return Validator::make($data,[
            'name'  => 'required|string|max:50',
            'email' => 'required|string|max:50|email',
            'password' => 'required|min:6|string',
            'vission' => 'required|string|max:250',
            'mission' => 'required|string|max:250',
            'description' => 'required|string|max:250'
        ]);
    }
}
