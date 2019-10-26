<?php

/**
 * @Author: fatoni
 * @Date:   2019-10-26 20:41:06
 * @Last Modified by:   fatoni
 * @Last Modified time: 2019-10-26 21:11:49
 */
namespace App\Http\Requests\Crew;

use App\Shared\BaseValidator;
use Illuminate\Validation\Rule;

class StoreCrewValidator extends BaseValidator
{
	
	public function __construct($id = null)
    {
    	$ignore = ($id != null) ? ','.$id : '';
        $this->rules = [
            'community_id'  => 'required|numeric|exists:communities,id',
            'position_id' 	=> 'required|numeric|max:50|exists:positions,id',
            'name' 			=> 'required|min:6|string',
            'email' 		=> 'required|email|unique:crews,email'.$ignore,
            'phone' 		=> 'required|unique:crews',
            'status' 		=> 'required'
        ];
    }
}