<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            "loginusername" => "required",
            "loginpassword" => "required"
        ]);
        if (auth()->attempt([
            "name" => $incomingFields["loginusername"], 
            "password" => $incomingFields["loginpassword"]
            ]))
        {
            $request->session()->regenerate();
        }
        return redirect("/");
    }


    public function logout() {
        auth()->logout();
        return redirect("/");
    }

   public function register(Request $request)   //Request ist ein Assistent, der uns hilft, die Wünsche unserer Besucher zu verstehen,
                                                //Hier sind einige Funktionen: Input-Daten abrufen, Datei-Uploads verabreiten, Session-Daten verwalten                                      //und Cookies lesen
    {
    $incomingFields = $request->validate([
        // 'name' => 'required',
        // 'email' => 'required',
        // 'password' => 'required'
        'name' => ['required', 'min:3',  Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8'],
    ]);
       
        $incomingFields['password'] = bcrypt($incomingFields['password']);   
        $user = User::create($incomingFields); //schreibt die Daten in die DB
        auth()->login($user);

        return redirect("/");
    
   }
}
