<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginrequest;
use Illuminate\Http\Request;

class authcontroller extends Controller
{
    /**
     * login method
     */
    public function login(loginrequest $request){
          $token=auth()->attempt($request->validated());
          //dd($token);
          if($token){
            return $this->responseWithToken($token, auth()->user());
          }
          else {
            return response()->json([
                'status'=>'failed',
                'message'=>'Invalid credentials'
            ],401);
          }
    }
    public function responseWithToken($token, $administrateur)
{
    return response()->json([
        'status' => 'success',
        'user' => $administrateur,
        "access_token" => $token,
        'type' => 'bearer'
    ]);
}
public function logout()
    {
        auth()->logout();  // Invalide le token

        return response()->json(['message' => 'Successfully logged out']);
    }

}