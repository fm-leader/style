<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'nom_employe'=>['required','string','max:100'],
            'fonction_employe'=>['required','string','max:100'],
            'telephone_employe'=>['required','numeric'],
            'adresse_employe'=>['string'],
            'photo_employe'=>['image'],

        ];
    }
}
