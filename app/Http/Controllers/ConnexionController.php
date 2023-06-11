<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function showloginForm(){
        return view ('connexion');
    }
    public function login(Request $request){
        $mail = $request->input('mail');
    $password = $request->input('psw');
    }
}
