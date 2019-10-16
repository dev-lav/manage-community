<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ProgramResource;
use App\Program;

class ProgramController extends Controller
{
     public function getListProgram(){
        
        return ProgramResource::collection(
                     Program::paginate()
            );

    }

    public function createProgramData(Request $request){

        $attributes = $request->json()->all();
        
        Program::create($attributes);

        return response(
                new ProgramResource(
                    Program::latest()->first())
            );
    }

    public function getProgramById($programId){

        return response(
            new ProgramResource(
                    Program::findOrFail($programId)
            )
        );
    }

    public function updateSingleProgramData(Request $request, $programId){

        $attributes = $request->json()->all();
        
        Program::findOrFail($programId)
                   ->update($attributes);

        return response(
            new ProgramResource(
                Program::findOrFail($programId)
            )
        );            
    }

    public function deleteSingleProgramData($programId){
        
        Program::findOrFail($programId)
                       	     ->delete();   

        return response()->json("successfully deleted!");

    }
}
