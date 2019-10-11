<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'description' => 'required|max:150',
            'type' => 'required|max:50',
            'pic_name' => 'required|max:50',
            'pic_phone' => 'required|max:20',
            'pic_email' => 'required|max:50',
        ];
    }
}
