<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeleRequest extends FormRequest
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

            //'description_modele'

             'lib_modele'=>['required','string','max:100'],
             'prix_modele'=>['required','numeric','min:1000'],
             'image_modele'=>['required','image'],
             'description_modele'=>['string'],


        ];
    }
}
