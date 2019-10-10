<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    protected $fillable = [
    	'crew_id',
    	'venue_id',
        'date',
        'name',
    	'description',
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];
}
