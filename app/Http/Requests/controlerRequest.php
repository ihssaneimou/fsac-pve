<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class controlerRequest extends FormRequest
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
            'id_administrateur'=>'required | integer | exists:administrateurs,id_administrateur',
            'id_tablette'=>'required | integer | exists:tablettes,id_tablette',
            
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
            'id_administrateur.required'=>" l'id de ladministrateur doit etre fourni",
            'id_administrateur.exists:administrateurs,id_administrateur' =>"le id de ladministrateur doit etre existe",
            'id_administrateur.integer' =>"l id de ladministrateur doit être un  nombre entier",
            'id_tablette.required'=>"l'id de la tablette doit etre fourni",
            'id_tablette.integer'=>"l'id la tablette doit etre un entier",
            'id_tablette.exists:tablettes,id_tablettes'=>"l 'id la tablette doit etre existe",
        ];
    }
}


