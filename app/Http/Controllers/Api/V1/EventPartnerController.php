<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\EventPartnerResource;
use App\EventPartner;

class EventPartnerController extends Controller
{
    
    public function getListEventPartner(){
        
        return EventPartnerResource::collection(
                     EventPartner::paginate()
            );

    }

    public function createEventPartnerData(Request $request){

        $attributes = $request->json()->all();
        
        EventPartner::create($attributes);

        return response(
                new EventPartnerResource(
                    EventPartner::latest()->first())
            );
    }

    public function getEventPartnerById($eventId){

        return response(
            new EventPartnerResource(
                    EventPartner::findOrFail($eventId)
            )
        );
    }

    public function updateSingleEventPartnerData(Request $request, $eventId){

        $attributes = $request->json()->all();
        
        EventPartner::findOrFail($eventId)
                   ->update($attributes);

        return response(
            new EventPartnerResource(
                EventPartner::findOrFail($eventId)
            )
        );            
    }

    public function deleteSingleEventPartnerData($eventId){
        
        EventPartner::findOrFail($eventId)
                       ->delete();   

        return response()->json("successfully deleted!");

    }
}
