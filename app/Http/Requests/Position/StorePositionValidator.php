<?php

/**
 * @Author: fatoni
 * @Date:   2019-10-26 21:33:08
 * @Last Modified by:   fatoni
 * @Last Modified time: 2019-10-26 21:35:29
 */
namespace App\Http\Requests\Position;

use App\Shared\BaseValidator;
use Illuminate\Validation\Rule;

class StorePositionValidator extends BaseValidator
{
	
	public function __construct($id = null)
    {
        $ignore = ($id != null) ? ','.$id : '';

        $this->rules = [
            'name' => 'required|string|max:50|unique:positions,name'.$ignore,
            'description' => 'required|string|max:250'
        ];
    }
}