<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'password' => ['required', 'min:8'],
            'family_name' => ['required'],
            'first_name' => ['required'],
            'sex' => ['required'],
            'year' => ['required'],
            'month' => ['required'],
            'day' => ['required'],
            'zip' => ['required', 'digits:7'],
            'address1' => ['required', 'regex:/^(.+[都道府県])(.+[市町村区]).+[0-9]+$/'],
            'email' => ['required', 'email:rfc'],
            'tel' => ['required', 'digits_between:10,11']
        ];
    }
}
