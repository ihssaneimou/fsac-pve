<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RapportRequest;
use App\Models\Rapport;
use Exception;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(){
        return 'Liste des rapport';
    }
    public function store(RapportRequest $request){

        try{
        $rapport = new Rapport();
        $rapport->titre_rapport=$request->titre_rapport;
        $rapport->contenu=$request->contenu;
        $rapport->id_pv=$request->id_pv;
        $rapport->codeApogee=$request->codeApogee;
        $rapport->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>'la rapport a été ajouté',
            'data'=>$rapport
        ]);
        
        }catch(Exception $exception){
            return response()->json($exception);
        }
        
    }

    public function update(RapportRequest $request,Rapport $rapport) {
        
        // $filiere=$filiere::find($id);

        try{
        
            $rapport->titre_rapport=$request->titre_rapport;
            $rapport->contenu=$request->contenu;
            $rapport->id_pv=$request->id_pv;
            $rapport->codeApogee=$request->codeApogee;
            $rapport->save();
        return response()->json([
            'status_code'=>201,
            'status_message'=>'le rapport  a été modifié',
            'data'=>$rapport
        ]);

        }catch(Exception $exeption){
            return response()->json($exeption);
        }
       
    }

    public function delete(Rapport $rapport) {
         try{
                $rapport->delete();

            return response()->json([
                'status_code'=>200,
                'status_message'=>'le rapport  a été supprimer',
                'data'=>$rapport
            ]);
            
            
         }catch(Exception $exeption){
            return response()->json($exeption);
        }
    }
}
