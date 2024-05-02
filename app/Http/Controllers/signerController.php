<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\signerRaquest;
use App\Models\signer;
use Exception;
use Illuminate\Http\Request;

class signerController extends Controller
{
    public function index(){
        return 'Liste des signature';
    }
    public function store(signerRaquest $request){

        try{
        $signer = new signer();
        $signer->id_surveillant=$request->id_surveillant;
        $signer->id_pv=$request->id_pv;
        $signer->signature= $request->signature;
        $signer->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>'la signature a été ajouté',
            'data'=>$signer
        ]);
        
        }catch(Exception $exception){
            return response()->json($exception);
        }
        
    }

    public function update(signerRaquest $request,signer $signer) {
        
        // $pv=$pv::find($id);

        try{
            $signer->id_surveillant=$request->id_surveillant;
            $signer->id_pv=$request->id_pv;
            $signer->signature= $request->signature;
        $signer->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>'la signature  a été modifié',
            'data'=>$signer
        ]);

        }catch(Exception $exeption){
            return response()->json($exeption);
        }
       
    }

    public function delete(signer $signer) {
         try{
                $signer->delete();

            return response()->json([
                'status_code'=>200,
                'status_message'=>'la signature a été supprimer',
                'data'=>$signer
            ]);
            
            
         }catch(Exception $exeption){
            return response()->json($exeption);
        }
    }
}
