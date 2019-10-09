<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
        'crew_id',
        'name',
        'description',
    ];
}
