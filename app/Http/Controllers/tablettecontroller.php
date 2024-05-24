<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\tabletteRequest;
use App\Models\tablette;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class tabletteController extends RoutingController
{
     /**
     * @OA\Get(
     *     path="/api/tablette",
     *     tags={"Tablette"},
     *     summary="afficher toute les tablettes for REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="indexTablette",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function index(){
        $tablette = tablette::all();
        return response()->json($tablette);
    }
    /**
     * @OA\Post(
     *     path="/api/tablette/create",
     *     tags={"Tablette"},
     *     summary="ajouter une tablette pour REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="storetablette",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *      @OA\RequestBody(
     *         description="les donnees d'une tablette",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="adresse_mac", type="string", example=""),
     *             @OA\Property(property="numero_serie", type="integer", example=""),
     *             @OA\Property(property="statut", type="bool", example="false"),
     *             @OA\Property(property="code_association", type="integer", example="")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent() 
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function store(tabletteRequest $request){

        try{
            $tablette = new tablette();
            $tablette->id_tablette=$request->cid_tablette;
            $tablette->adresse_mac=$request->adresse_mac;
            $tablette->numero_serie=$request->numero_serie;
            $tablette->statut=$request->statut;
            $tablette->code_association=$request->code_association;
            $tablette->save();
    
    
            return response()->json([
                'status_code'=>201,
                'status_message'=>"tablette a été ajouté",
                'data'=>$tablette
            ]);
            
            }catch(Exception $exception){
                return response()->json($exception);
            }
        
    }
    /**
     * @OA\Put(
     *     path="/api/tablette/edit/{tablette}",
     *     tags={"Tablette"},
     *     summary="midifier les donnee d'une tablette pour REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="updatetablette",
     *    @OA\Parameter(
     *          name="tablette",
     *          description="tablette id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *         description="les donnees de tablette",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="adresse_mac", type="string", example=""),
     *             @OA\Property(property="numero_serie", type="integer", example=""),
     *             @OA\Property(property="statut", type="bool", example="false"),
     *             @OA\Property(property="code_association", type="integer", example="")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent() 
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function update(tabletteRequest $request,tablette $tablette) {
        
        try{
        
            $tablette->statut=$request->statut;
      
        $tablette->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>'le surveillant  a été modifié',
            'data'=>$tablette
        ]);

        }catch(Exception $exception){
            return response()->json($exception);
        }
    }
    /**
     * @OA\Delete(
     *     path="/api/tablette/{tablette}",
     *     tags={"Tablette"},
     *     summary="delete all tablettes for REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="delete tablette",
     *     @OA\Parameter(
     *          name="tablette",
     *          description="tablette id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent() 
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function delete(tablette $tablette) {
         try{
                $tablette->delete();

                return response()->json([
                'status_code'=>200,
                'status_message'=>'tablette est supprimer avec succes',
                'data'=>$tablette
            ]);
            
            
         }catch(Exception $exception){
            return response()->json($exception);
        }
    }
}  

