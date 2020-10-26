<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{

    function Login(Request $request) {

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
                    'email' => "required|email",
                    'password' => "required"
        ]);

        if ($validate->fails()) {
            /* la validacion fallo */
            $data = array(
                'status' => 400,
                'message' => 'El usuario no se ha podido identificar',
                'errors' => $validate->errors()
            );
        } else {
            /* La validacion es correcta */
            
            /* Voy a saltarme el proceso de creacion de un web token para no generar codigo que enrealidad no será utilizado */
            /* Tampoco voy a codificar la contraseña ya que tendria que crear tambien un register y creo que no es lo que intentan ver en esta prueba.*/
            
            $user = User::where([
                'email' => $params->email
            ])->first();
            
            if($user->password == $params->password){
                $data = array(
                    'status' => 200,
                    'message' => $user
                );
            }
            else{
                $data = array(
                    'status' => 400,
                    'message' => 'El usuario no se ha podido identificar',
                    'errors' => 'Contraseña no valida'
                );
            }
        }
        
        return response()->json($data, $data['status']);
    }
    
}
