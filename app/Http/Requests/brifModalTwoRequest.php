<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class brifModalTwoRequest extends FormRequest
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
            'web_sirketadi'=>'nullable|max:255',
            'web_logotip'=>'nullable|max:255',
            'web_fealiyyetsahesi'=>'nullable|max:255',
            'web_prespektiv'=>'nullable|max:255',
            'web_reqibler'=>'nullable|max:255',
            'web_firmastili'=>'nullable|array',
            'web_firmastili.*'=>'nullable|exists:veb_vesaits,id',
            'web_firmastilidiger'=>'nullable|max:255',
            'web_gosteris'=>'nullable|array',
            'web_gosteris.*'=>'nullable|exists:veb_vesaits,id',
            'web_gosterisvesaitidiger'=>'nullable|max:255',
            'web_qeydler'=>'nullable|max:255',
            'web_menu'=>'nullable|max:255',
            'web_ad'=>'required|max:255',
            'web_vezife'=>'required|max:255',
            'web_telefon'=>'required|max:255',
            'web_email'=>'required|max:255',
            'web_vaxt'=>'required|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'web_sirketadi'=>__('static.modal_1_label_2'),
            'web_logotip'=>__('static.modal_1_label_3'),
            'web_fealiyyetsahesi'=>__('static.modal_1_label_4'),
            'web_prespektiv'=>__('static.modal_1_label_5'),
            'web_reqibler'=>__('static.modal_1_label_6'),
            'web_firmastili'=>__('static.modal_1_label_13'),
            'web_firmastilidiger'=>__('static.modal_2_label_14'),
            'web_gosteris'=>__('static.modal_1_label_17'),
            'web_gosterisvesaitidiger'=>__('static.modal_2_label_14'),
            'web_qeydler'=>__('static.modal_2_label_16'),
            'web_menu'=>__('static.modal_2_label_17'),
            'web_ad'=>__('static.modal_1_label_20'),
            'web_vezife'=>__('static.modal_1_label_21'),
            'web_telefon'=>__('static.modal_1_label_22'),
            'web_email'=>__('static.modal_1_label_23'),
            'web_vaxt'=>__('static.modal_1_label_24')
        ];
    }
}
