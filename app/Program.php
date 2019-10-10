<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
       /**
    *
    * Define table name
    * @var string
    */
    protected $table = 'programs';

  	/**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
  		'crew_id',
  		'name',
  		'description'
  	];


  	/**
  	* Eloquent relationship for this table 
  	* with crew table  
  	* One to One relationship
  	* @return void
  	*/
  	public function crew(){
  		return $this->belongsTo('App\Crew');
  	}
}
