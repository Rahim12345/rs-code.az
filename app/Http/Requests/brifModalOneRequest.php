<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class brifModalOneRequest extends FormRequest
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
//        dd(request()->post());
        return [
            'sirketadi'=>'nullable|max:60000',
            'logotip'=>'nullable|max:60000',
            'fealiyyetsahesi'=>'nullable|max:60000',
            'prespektiv'=>'nullable|max:60000',
            'reqibler'=>'nullable|max:60000',
            'fealiyyetdairesi'=>'nullable|max:60000',
            'movcudlogo'=>'nullable|image|max:255',
            'reng'=>'nullable|max:60000',
            'logotipvacibliyi'=>'nullable|max:60000',
            'logotipsecimi'=>'nullable|exists:logo_tips,id',
            'karparativkart'=>'nullable|array',
            'karparativkart.*'=>'nullable|exists:vizit_karts,id',
            'konvert'=>'nullable|array',
            'konvert.*'=>'nullable|exists:konverts,id',
            'diger'=>'nullable|max:60000',
            'firma_stili'=>'nullable|array',
            'firma_stili.*'=>'nullable|exists:firma_stilis,id',
            'basqaarzu'=>'nullable|max:60000',
            'ad'=>'required|max:255',
            'vezife'=>'required|max:255',
            'telefon'=>'required|max:255',
            'email'=>'required|max:255',
            'vaxt'=>'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'sirketadi'=>__('static.modal_1_label_2'),
            'logotip'=>__('static.modal_1_label_3'),
            'fealiyyetsahesi'=>__('static.modal_1_label_4'),
            'prespektiv'=>__('static.modal_1_label_5'),
            'reqibler'=>__('static.modal_1_label_6'),
            'fealiyyetdairesi'=>__('static.modal_1_label_7'),
            'movcudlogo'=>__('static.modal_1_label_8'),
            'reng'=>__('static.modal_1_label_10'),
            'logotipvacibliyi'=>__('static.modal_1_label_11'),
            'logotipsecimi'=>__('static.modal_1_label_12'),
            'logotipsecimi.*'=>__('static.modal_1_label_12'),
            'karparativkart'=>__('static.modal_1_label_14'),
            'karparativkart.*'=>__('static.modal_1_label_14'),
            'konvert'=>__('static.modal_1_label_15'),
            'konvert.*'=>__('static.modal_1_label_15'),
            'diger'=>__('static.modal_1_label_16'),
            'firma_stili'=>__('static.modal_1_label_17'),
            'firma_stili.*'=>__('static.modal_1_label_17'),
            'basqaarzu'=>__('static.modal_1_label_18'),
            'ad'=>__('static.modal_1_label_20'),
            'vezife'=>__('static.modal_1_label_21'),
            'telefon'=>__('static.modal_1_label_22'),
            'email'=>__('static.modal_1_label_23'),
            'vaxt'=>__('static.modal_1_label_24'),
        ];
    }
}
