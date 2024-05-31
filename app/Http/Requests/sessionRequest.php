<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class sessionRequest extends FormRequest
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
            'nom_session'=>' string | max:20 |required',
            'type_session'=>' string | max:20 | required ',
            'Annee_universitaire'=>'required',
            'datedebut'=>'required | date',
            'datefin'=>'required | date'
            
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
            'nom_session.string'=>"le nom de la session  doit être un string",
            'nom_session.max:20'=>"le nom de la session ne doit pas depasser 20 characteres",
            'nom_session.required'=>" le nom de la session doit etre fourni",
            'type_session.string'=>"le type de la session  doit être un string",
            'type_session.max:20'=>"le type ne doit pas depasser 20 characteres",
            'type_session.required'=>" le type de la session doit etre fourni",
            'Annee_universitaire.required'=>" l'annee universitaire doit etre fourni",
            'datedebut.required'=>" la date de debut doit etre fourni",
            'datefin.required'=>" la date de fin doit etre fourni",
            'datedebut.date'=>" la date de debut doit etre une date de format yyyy-mm-dd",
            'datefin.date'=>" la date de fin doit etre une date de format yyyy-mm-dd",
        ];
    }
}