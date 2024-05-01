<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller ;
use App\Http\Requests\controlerRequest ;
use App\Models\Controler ;
use Exception;
use Illuminate\Http\Request;

class ControlerController extends Controller
{
    public function index(){
        return 'Liste des tablettes ';
    }
    public function store(controlerRequest $request){

        try { 
            $controler= new controler();
            $controler->id_administrateur=$request->id_administrateur;
            $controler->id_tablette=$request->id_tablette;
            $controler->save();
    
        
            return response()->json([
                'status_code'=>201,
                'status_message'=>'Controler a été ajouté',
                'data'=>$controler
            ]);
        
         }catch(Exception $exeption){
            return response()->json($exeption);
        }
        
    } 

    public function update(ControlerRequest $request, controler $controler) {
        

        try{
        
            $controler->id_administrateur=$request->id_administrateur;
            $controler->id_tablette=$request->id_tablette; 
            $controler->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>'Controler a été modifié',
            'data'=>$controler
        ]);

        }catch(Exception $exeption){
            return response()->json($exeption);
        }
       
    }
} 