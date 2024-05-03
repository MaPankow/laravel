<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
        public function create_post(Request $request){

            $incomingFields = $request->validate([
                "title" => "required",
                "body" => "required"
            ]);

            $incomingFields["title"] = strip_tags($incomingFields["title"]);
            // Die Funktion strip_tags() in PHP ist eine nützliche Funktion, um HTML- und PHP-Tags aus einem gegebenen String zu entfernen.
            // Diese Funktion wird häufig verwendet, um Eingaben zu bereinigen und zu verhindern, 
            // dass Benutzer potenziell gefährlichen HTML-Code oder Skripte in Formulare einfügen, die dann auf der Webseite ausgeführt werden könnten.
            $incomingFields["body"] = strip_tags($incomingFields["body"]);
            $incomingFields["user_id"] = auth()->id();

            Blog::create($incomingFields); //hier schreibt das Model die Daten in die DB ein



        // Error handling with try-catch
        // try {
        //     $post = Post::create($incomingFields);
        //     return redirect()->route('posts.index')->with('success', 'Post created successfully!');
        // } catch (\Exception $e) {
        //     // Logging the error
        //     \Log::error($e->getMessage());
        //     // Optionally, you can redirect back with an error message
        //     return back()->with('error', 'Failed to create the post: ' . $e->getMessage());
        // }
    



           return redirect("/");
        }
}
