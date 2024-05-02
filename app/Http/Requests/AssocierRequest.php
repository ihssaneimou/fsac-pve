<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AssocierRequest extends FormRequest
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
            'id_surveillant'=>'required | integer | exists:surveillants,id_surveillant',
            'id_affectation'=>'required | integer | exists:affectations,id_affectation',
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
            'id_surveillant.required'=>" l'id_surveillant doit etre fourni",
            'id_surveillant.exists:surveillants,id_surveillant' =>"le id surveillant doit etre existe",
            'id_surveillant.integer' =>"le id surveillant doit être un  nombre entier",
            'id_affectation.required'=>'le code de affectation doit etre fourni',
            'id_affectation.integer'=>'le code du affectation doit etre entier',
            'id_affectation.exists:locals,id_local'=>'le code du affectation doit exister',
        ];
    }
}
