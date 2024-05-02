<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class signerRaquest extends FormRequest
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
            'id_pv'=>'required | integer | exists:pvs,id_pv',
            'signature'=>'required | string',
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
            'id_surveillant.required'=>'le id de surveillant est obligatoire',
            'id_surveillant.integer'=>'le id de surveillant dois étre entier ',
            'id_surveillant.exists:surveillants,id_surveillant'=>'le id de surveillant n\'existe pas',
            'id_pv.required'=>'le id de pv est obligatoire',
            'id_pv.integer'=>'le id de pv dois étre entier ',
            'id_pv.exists:pvs,id_pv'=>'le id de pv n\'existe pas',
            'signature.required'=>'la signature est obligatoire',
            'signature.string'=>'la signature dois étre une chaine de caractere',
            
        ];
    }
}
