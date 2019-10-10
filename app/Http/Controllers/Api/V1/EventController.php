<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\EventResource;
use App\Event;


class EventController extends Controller
{


    public function getListEvent(){
        
        return EventResource::collection(
                     Event::paginate()
            );

    }

    public function createEventData(Request $request){

        $attributes = $request->json()->all();
        
        Event::create($attributes);

        return response(
                new EventResource(
                    Event::latest()->first())
            );
    }

    public function getEventById($eventId){

        return response(
            new EventResource(
                    Event::findOrFail($eventId)
            )
        );
    }

    public function updateSingleEventData(Request $request, $eventId){

        $attributes = $request->json()->all();
        
        Event::findOrFail($eventId)
                   ->update($attributes);

        return response(
            new EventResource(
                Event::findOrFail($eventId)
            )
        );            
    }

    public function deleteSingleEventData($eventId){
        
        Event::findOrFail($eventId)
                       ->delete();   

        return response()->json("successfully deleted!");

    }
}
