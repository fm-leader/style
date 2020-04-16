<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            //,'email_client','adresse_client','photo_client','dimension_client'
            'nom_client'=>['required','string','max:100'],
            'contact_client'=>['required','numeric'],
            'email_client'=>['string'],
            'adresse_client'=>['string'],
            'photo_client'=>['image'],
            'dimension_client'=>['string'],
        ];
    }
}
