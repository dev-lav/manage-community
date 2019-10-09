<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
        'name',
        'location',
        'capacity',
        'pic_name',
        'pic_phone',
        'pic_email',
    ];
}
