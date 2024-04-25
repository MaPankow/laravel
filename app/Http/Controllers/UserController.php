<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function register(Request $request)   //Request ist ein Assistent, der uns hilft, die Wünsche unserer Besucher zu verstehen,
                                                //Hier sind einige Funktionen: Input-Daten abrufen, Datei-Uploads verabreiten, Session-Daten verwalten
                                                //und Cookies lesen
    {
    $incomingFields = $request->validate([
        // 'name' => 'required',
        // 'email' => 'required',
        // 'password' => 'required'
        'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8', 'max:20'],
    ]);
       
        $incomingFields['password'] = bcrypt($incomingFields['password']);   
        User::create($incomingFields); //schreibt die Daten in die DB

        return 'Hello from our controller';
    
   }
}
