<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPartner extends Model
{
    /**
    *
    * Define table name
    * @var string
    *
    */
    protected $table = 'event_partners';

    /**
    *
    * Define fillable column
    * @var array
    */
    protected $fillable = [
    	'event_id',
    	'partner_id'
    ];

    public function partner(){
        $this->belongsTo('App\Partner');
    }

    public function event(){
        $this->belongsTo('App\Event');
    }

}
