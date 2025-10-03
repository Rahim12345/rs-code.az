<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreeSeoAuditRequest extends FormRequest
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
            'url'=>'required|url|max:191',
            'email3'=>'required|email',
            'tel'=>'required|max:40',
        ];
    }

    public function attributes()
    {
        return [
            'url'=>__('index.seoadiut3'),
            'email3'=>__('index.seoadiut4'),
            'tel'=>__('index.seoadiut5')
        ];
    }
}
