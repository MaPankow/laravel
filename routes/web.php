<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
//    $daten = ['Titel' => 'Willkommen bei Laravel'];
    return view('home');
});


// Route::get('/user/{id}', function ($id) {
//     return 'Benutzer ID: ' . $id;    //http://127.0.0.1:8000/user/123
// });

// Route::get('/user/{name?}', function ($name = 'Gast') {      //wenn wir ein Fragezeichen haben, dann handelt es sich um optionale Parameter
//     return 'Hallo ' . $name;
// });

// In diesem Beispiel ist name ein optionaler Parameter. Wenn Sie auf /user/Tom zugreifen, erhalten Sie "Hallo Tom". 
// Wenn Sie jedoch nur /user aufrufen, wird der Standardwert "Gast" verwendet, und die Ausgabe ist "Hallo Gast".


// Route::get('/post/{id}', function ($id) {
//     return 'Post ID: ' . $id;
// })->where('id', '[0-9]+');

//Dies stellt sicher, dass die Route nur aktiviert wird, wenn die Parameter den definierten Mustern entsprechen.
// Hier wird durch where('id', '[0-9]+') festgelegt, dass die id nur numerisch sein darf. 
// Ein Zugriff auf /post/abc würde nicht funktionieren, weil abc nicht den Regular Expression-Bedingungen entspricht.


// Situative Nutzung von Parametern
// In manchen Fällen möchten Sie, dass Routenparameter die Logik in der Anwendung beeinflussen, 
// wie beispielsweise das Anzeigen unterschiedlicher Inhalte basierend auf einem übergebenen Parameter.

// Route::get('/dashboard/{role?}', function ($role = null) {
//     if ($role === 'admin') {
//         return view('home');
//     }
//     return view('welcome');
// });

// In diesem Beispiel wird der optionale Parameter role verwendet, um zu entscheiden, welche Dashboard-Ansicht gerendert werden soll. 
// Wenn der Parameter admin lautet, wird die admin.dashboard View geladen, ansonsten die user.dashboard View.


// Benennen von Routen und Verwendung von Hilfsfunktionen
// Schließlich ist es eine gute Praxis, Routen Namen zu geben, damit Sie sie leichter in Ihrer Anwendung referenzieren können,
// insbesondere beim Umleiten oder Generieren von URLs.

// Route::get('/login', function () {
//     // Logik für Login
// })->name('login');

// //Verwendung der benannten Route:

// return redirect()->route('login');

// In diesem Beispiel wird die redirect()-Hilfsfunktion verwendet, um zur login-Route umzuleiten.
//  Das Verwenden von Routennamen macht Ihren Code klarer und weniger fehleranfällig, wenn URLs sich ändern

Route::post("/register", [UserController::class, 'register']);
Route::post("/logout", [UserController::class, 'logout']);
Route::post("/login", [UserController::class, 'login']);



