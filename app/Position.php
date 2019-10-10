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

    /**
    * Eloquent relationship for this model 
    * with crew model  
    * One to One relationship
    * @return void
    */
    public function crew(){

      return $this->hasOne('App\Crew', 'position_id');
  
    }
}
