<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    /**
    * Define table name
    * @var string
    */
    protected $table = 'communities';

  	/**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
  		'id',
      'name',
  		'email',
  		'password',
  		'vission',
  		'mission',
  		'description',
  	];

}
