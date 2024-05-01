<?php

namespace App\Http\Controllers;


use App\Http\Requests\gererRequest;
use App\Models\gerer;
use Exception;
use Illuminate\Http\Request;


class gererController extends Controller
{
    
        public function index(){
            return 'Liste des sessions gerees';
        }
        public function store(gererRequest $request){
    
            try{
            $gerer = new gerer();
            $gerer->id_administrateur=$request->id_administrateur;
            $gerer->id_session=$request->id_session;
            
    
            $gerer->save();
    
    
            return response()->json([
                'status_code'=>201,
                'status_message'=>'la gestion est ajoutee',
                'data'=>$gerer
            ]);
    
            }catch(Exception $exeption){
                return response()->json($exeption);
            }
    
        }
    
        public function update(gererRequest $request, gerer $gerer) {
            try {
                $gerer->id_administrateur = $request->id_administrateur;
                $gerer->id_session = $request->id_session;
                $gerer->save();
        
                return response()->json([
                    'status_code' => 201,
                    'status_message' => 'La gestion a été modifiée',
                    'data' => $gerer
                ]);
        
            } catch(Exception $exception) {
                return response()->json($exception);
            }
        }
}
