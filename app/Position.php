<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
    *
    * Define table name
    * @var string
    */
    protected $table = 'positions';

  	/**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
  		'name',
  		'description',
  	];

}
