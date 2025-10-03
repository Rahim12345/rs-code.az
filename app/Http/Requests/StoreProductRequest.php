<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'src'=>'nullable|max:1048',
            'service_id'=>'required|exists:services,id',
            'company_id'=>'required|exists:companies,id',
            'title_az'=>'nullable|max:255',
            'title_en'=>'nullable|max:255',
            'title_ru'=>'nullable|max:255',
            'images'=>'nullable|array',
            'alt'=>'nullable|max:255',
            'images.*'=>'nullable|image'
        ];
    }

    public function attributes()
    {
        return [
            'src'=>'Cover',
            'service_id'=>'Servis',
            'company_id'=>'Company',
            'title_az'=>'Title(AZ)',
            'title_en'=>'Title(EN)',
            'title_ru'=>'Title(RU)',
            'title_az'=>'Text(AZ)',
            'title_en'=>'Text(EN)',
            'title_ru'=>'Text(RU)',
            'images'=>'Images'
        ];
    }
}
