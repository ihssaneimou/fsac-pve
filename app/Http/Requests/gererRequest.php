<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class gererRequest extends FormRequest {

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
            'id_administrateur'=>'required | integer | exists:administrateurs,id_administrateur',
            'id_session'=>'required | integer | exists:sessions,id_session',
            
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
            'id_administrateur.required'=>' l\'id de ladministrateur doit etre fourni',
            'id_administrateur.exists:administrateurs,id_administrateurs' =>"l\'id de ladministrateur doit etre existe",
            'id_administrateur.integer' =>'l\'id de ladministrateur doit être un  nombre entier',
        
            'id_session.required'=>'l\' id de la session doit etre fourni',
            'id_session.integer'=>'l\'id le la session doit etre un entier',
            'id_session.exists:sessions,id_sessions'=>'l\'id le la session doit etre existe',
    

        ];
    }
}
