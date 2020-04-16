<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
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
            'lib_cmd'=>['string'],
            'date_cmd'=>['date'],
            'rdv_cmd'=>['required','date'],
            'prix_cmd'=>['required','numeric'],
            'echantillon_cmd'=>['image'],
            'description_cmd'=>['string'],
            'modele_id'=>['required'],
            'client_id'=>['integer','required'],
        ];
    }
}
