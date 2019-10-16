<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    /**
    *
    * Define table name
    * @var string
    */
    protected $table = 'crews';

  	/**
  	*
  	* list of fillable column
  	* @var array
  	*/
  	protected $fillable = [
      		'community_id',
      		'position_id',
      		'name',
      		'email',
      		'phone',
      		'status'
  	   ];


  	/**
  	* Eloquent relationship for this model 
  	* with communities model  
  	* One to Many relationship
  	* @return void
  	*/
  	public function community(){
  	
    	return $this->belongsTo('App\Community', 'community_id');
  	
    }

  	/**
  	* Eloquent relationship for this model 
  	* with positions model  
  	* One to One relationship
  	* @return void
  	*/
  	public function position(){
  		
      return $this->hasOne('App\Position');

    }

    /**
    * Eloquent relationship for this model 
    * with programs model  
    * One to Mane relationship
    * @return void
    */
    public function programs(){
      return $this->hasMany('App\Program', 'crew_id');
    }

    /**
    * Eloquent relationship for this model 
    * with Event model  
    * One to Mane relationship
    * @return void
    */

  	public function events()
    {
      return $this->hasMany('App\Event', 'crew_id');
    }
}
