<?php

namespace App\Http\Controllers;
use App\Http\Requests\sessionRequest;
use App\Models\session;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class sessionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/session",
     *     tags={"session"},
     *     summary="afficher tout les session REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="indSession",
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
        $session = session::all();
        return response()->json($session);
    }

    /**
     * @OA\Post(
     *     path="/api/session/create",
     *     tags={"session"},
     *     summary="create une session REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="storesession",
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
     *         description="les donner de session",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nom_session", type="string", example=""),
     *             @OA\Property(property="type_session", type="string", example=""),
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
    public function store(sessionRequest $request){
        try{
        $session = new session();
        $session->nom_session=$request->nom_session;
        $session->type_session=$request->type_session;
        $session->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>'session ajouté avec succes',
            'data'=>$session
        ]);
        
        }catch(Exception $exception){
            return response()->json($exception);
        }
        
    }
    
    /**
     * @OA\Put(
     *     path="/api/session/edit/{session}",
     *     tags={"session"},
     *     summary="update all admins for REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="updatesession",
     *    @OA\Parameter(
     *          name="status",
     *          description="session id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *         description="les donnée de session",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nom_session", type="string", example=""),
     *             @OA\Property(property="type_session", type="string", example=""),
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

    public function update(sessionRequest $request,session $session) {
        
        

        try{
        
        $session->nom_session=$request->nom_session;
        $session->type_session=$request->type_session;
        $session->save();

        return response()->json([
            'status_code'=>201,
            'status_message'=>' la session a été modifié',
            'data'=>$session
        ]);

        }catch(Exception $exeption){
            return response()->json($exeption);
        }
       
    }

    /**
     * @OA\Delete(
     *     path="/api/session/{session}",
     *     tags={"session"},
     *     summary="delete all admins for REST API",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="deletesession",
     *     @OA\Parameter(
     *          name="session",
     *          description="session id",
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
    public function delete(session $session) {
         try{
                $session->delete();

            return response()->json([
                'status_code'=>200,
                'status_message'=>'la session  a été supprimer',
                'data'=>$session
            ]);
            
            
         }catch(Exception $exception){
            return response()->json($exception);
        }
    }
}
