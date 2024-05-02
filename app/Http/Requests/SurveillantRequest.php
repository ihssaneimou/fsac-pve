<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class SurveillantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_departement'=>'required | integer | exists:departements,id_departement',
            'nomComplet_s'=>'required | string ',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'error'=>true,
            'message'=> 'Erreur de validation',
            'errorList'=>$validator->errors(),

        ]));
    }
    public function messages()
    {
        return[
            'id_departement.required'=>'le id de departement doit etre fourni',
            'id_departement.integer'=>'le id du departement doit etre entier',
            'id_departement.exists:departements,id_departement'=>'le id du departement doit exister',
            'nomComplet_s.required'=>"le nom du surveillant doit être fourni",
            'nomComplet_s.string'=>"la nom du surveillant doit être un string",
        ];
    }
}
