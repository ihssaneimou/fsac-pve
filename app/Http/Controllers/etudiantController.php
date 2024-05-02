<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantRequest;
use App\Models\etudiant;
use Exception;
use Illuminate\Http\Request;

class etudiantController extends Controller
{
    public function index(){
        return 'Liste des etudiants';
    }
    public function store(EtudiantRequest $request){

        try{
        $etudiant = new etudiant();
        //$etudiant->codeApogee=$request->codeApogee;
        $etudiant->id_rapport=$request->id_rapport;
        $etudiant->nom_etudiant=$request->nom_etudiant;
        $etudiant->prenom_etudiant=$request->prenom_etudiant;
        $etudiant->CNE=$request->CNE;
        $etudiant->photo=$request->photo;
        $etudiant->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>"l'etudiant a été ajouté",
            'data'=>$etudiant
        ]);
        
        }catch(Exception $exception){
            return response()->json($exception);
        }
        
    }

    public function update(EtudiantRequest $request,etudiant $etudiant) {

        try{
        
            $etudiant->id_rapport=$request->id_rapport;
            $etudiant->nom_etudiant=$request->nom_etudiant;
            $etudiant->prenom_etudiant=$request->prenom_etudiant;
            $etudiant->CNE=$request->CNE;
            $etudiant->photo=$request->photo;
      
        $etudiant->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>'la etudiant  a été modifié',
            'data'=>$etudiant
        ]);

        }catch(Exception $exception){
            return response()->json($exception);
        }
       
    }

    public function delete(etudiant $etudiant) {
         try{
                $etudiant->delete();

            return response()->json([
                'status_code'=>200,
                'status_message'=>"l'etudiant  a été supprimer",
                'data'=>$etudiant
            ]);
            
            
         }catch(Exception $exception){
            return response()->json($exception);
        }
    }
}
