<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateDepartementRequest extends FormRequest
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
            'nom_departement'=>'required | unique:departements',
            'code_departement'=>'required | unique:departements'

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
            'nom_departement.required'=>'un nom de departement doit etre fourni',
            'nom_departement.unique'=>'un nom de departement doit etre unique',
            'code_departement.required'=>'un nom de departement doit etre fourni',
            'code_departement.unique'=>'un nom de departement doit etre unique'

        ];
    }
}
