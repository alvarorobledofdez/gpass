<?php

namespace App\Http\Controllers;

use App\Login;
use App\User;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class LoginController extends Controller
{
    protected function login(Request $request)
    {
        if (!isset($_POST['email']) or !isset($_POST['password'])) 
        {
            return $this->error(401, 'Debes rellenar todos los campos')->header('Access-Control-Allow-Origin', '*');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $key = $this->key;
        if (self::checkLogin($email, $password))
        {
            $array = $arrayName = array
            (
                 'email' => $email,
                 'password' => $password
            );
            $jwt = JWT::encode($array, $key);
            return response($jwt)->header('Access-Control-Allow-Origin', '*');
        }
        else
        {
            return response("Los datos no son correctos", 402)->header('Access-Control-Allow-Origin', '*');
        }
    }
    private function checkLogin($email, $password)
    {
        $userSave = User::where('email', $email)->first();
        $emailSave = $userSave->email;
        $passwordSave = $userSave->password;
        if($emailSave == $email and $passwordSave == $password)
        {
            return true;
        }
        return false;
    }    
}

