<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator ;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class tabletteRequest extends FormRequest
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
            'adresse_mac'=>' string | max:12 | required',
            'numero_serie'=>'numeric |required',
            'statut'=>'boolean  | required',
            'code_association'=>'numeric |required'
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
            'adresse_mac.string'=>"ladresse  doit être un string",
            'adresse_mac.max:12'=>"ladresse ne doit pas depasser 12 characteres",
            'adresse_mac.required'=>"ladresse est obligatoire",
            //"numero_serie.digits"=>"Le numéro de série doit contenir exactement 20 chiffres ",
            "numero_serie.numeric"=>"le numéro de série doit etre numerique",
            "numero_serie.required"=>"Le numéro de série est requis",
            "code_association.numeric"=>"Le code d'association doit être un nombre",
            //"code_association.digits"=>"Le code d'association doit contenir exactement 20 chiffres",
            "code_association.required"=>"Le code d'association est obligatoire",
            "statut.boolean"=>"Le champ statut doit être une valeur boolean",
            "statut.required"=>"Le champ statut est obligatoire"
        ];
    }
}
