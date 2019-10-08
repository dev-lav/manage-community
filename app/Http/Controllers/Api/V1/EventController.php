<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;


class EventController extends Controller
{
    /**
    *
    * @return json
    */
    public function index(Request $request)
    {
    	$response = array(
    		'status_code' => 200,
    		'success' => true,
    		'message' => "success",
    		'data' => Event::all()
    	);
    	return response()->json($response, 200);
    }

    public function store(Request $request)
    {
       $create = 
        Event::create([
            'crew_id' => $request->crew_id,
            'vanue_id' => $request->vanue_id,
            'date' => $request->date,
            'name'  => $request->name,
            'description' => $request->description
        ]);
        return response()->json($create, 200);
    }
}
