<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssocierRequest;
use App\Models\associer;
use Exception;
use Illuminate\Http\Request;

class passerController extends Controller
{
    public function index(){
        return 'Liste des surveillants affectes';
    }
    public function store(associerRequest $request){

        try{
        $associer = new associer();
        $associer->id_surveillant=$request->id_surveillant;
        $associer->id_affectation=$request->id_affectation;
        

        $associer->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>'associer a été ajouté',
            'data'=>$associer
        ]);
        
        }catch(Exception $exeption){
            return response()->json($exeption);
        }
        
    }

    public function update(AssocierRequest $request,associer $associer) {
        

        try{
         $associer->id_surveillant=$request->id_surveillant;
         $associer->id_affectation=$request->id_affectation;
      
        $associer->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>'passer  a été modifié',
            'data'=>$associer
        ]);

        }catch(Exception $exeption){
            return response()->json($exeption);
        }
       
    }
}
