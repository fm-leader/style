<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgressionRequest extends FormRequest
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
        $date_jour= date('d-m-Y');
        return [
            //
            'lib_progres'=>['required','string'],
            'materiel_progres'=>['string'],
            'datfin_progres'=>['date'],
            'datdeb_progres'=>['date'],
            'employe_id'=>['required','integer'],
            'commande_id'=>['required','integer'],
            'prix_progres'=>['required','numeric'],

        ];
    }
}
//['lib_progres','datdeb_progres','prix_progres','datfin_progres','materiel_progres','employe_id','commande_id']