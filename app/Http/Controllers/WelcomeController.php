<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
class WelcomeController extends Controller
{
    public function welcome()
    {
        $randomUser = DB::table('inscription')->inRandomOrder()->first();
        
        if ($randomUser) {
            $dateOfBirth = new DateTime($randomUser->datenaissance);
            $today = new DateTime();
            $age = $today->diff($dateOfBirth)->y;
            
            return view('welcome')->with([
                'nom' => $randomUser->nom,
                'prenom' => $randomUser->prenom,
                'URL' => $randomUser->Url,
                'age' => $age,
                'Ville' => $randomUser->Ville,
                'Pays' => $randomUser->Pays,
                'mail' => $randomUser->mail,
                'tel' => $randomUser->tel,
                'mois' => date('F jS', strtotime($randomUser->datenaissance)),
            ]);
        }

        return view('welcome');
    }
}