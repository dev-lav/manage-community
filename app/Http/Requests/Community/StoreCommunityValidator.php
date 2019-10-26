<?php

/**
 * @Author: fatoni
 * @Date:   2019-10-26 18:23:02
 * @Last Modified by:   fatoni
 * @Last Modified time: 2019-10-26 21:06:32
 */
namespace App\Http\Requests\Community;

use App\Shared\BaseValidator;
use Illuminate\Validation\Rule;

class StoreCommunityValidator extends BaseValidator
{
	
	public function __construct($id = null)
    {
        $ignore = ($id != null) ? ','.$id : '';

        $this->rules = [
            'name'  => 'required|string|max:50',
            'email' => 'required|string|max:50|email|unique:communities,email'.$ignore,
            'password' => 'required|min:6|string',
            'vission' => 'required|string|max:250',
            'mission' => 'required|string|max:250',
            'description' => 'required|string|max:250'
        ];
    }
}