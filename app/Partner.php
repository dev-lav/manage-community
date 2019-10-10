<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
        'name',
        'description',
        'type',
        'pic_name',
        'pic_phone',
        'pic_email',
    ];
}
