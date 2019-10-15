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

    public function crew()
    {
        return $this->belongsTo('App\Crew', 'crew_id');
    }

    public function venue()
    {
        return $this->belongsTo('App\Venue', 'venue_id');
    }

    public function eventpartners()
    {
        return $this->hasMany('App\EventPartner', 'event_id');
    }
}
