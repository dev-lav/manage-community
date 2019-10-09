<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    protected $fillable = [
    	'crew_id',
    	'vanue_id',
    	'date',
    	'description',
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];


    public function listDataEvent(){

    }
}
