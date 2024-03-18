<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route préfixées avec une racine, un nom commun à toute
//Permet de faire un changement sur plusieurs routes à un seul endroit
Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request){
        
        $post = new Post();
        $post->title = 'Mon troisième article';
        $post->slug = 'mon-troiseme-article';
        $post->content = 'Mon contenu';
        $post->save();
        
        //return Post::all(['id', 'title']);
        //$posts = Post::where('id', '>', 0)->get();

        //dd($posts);
        
        return $post;

        return [
            "link" => route('blog.show', ['slug' => 'article', 'id' => 13]),
            
        ];
    })->name('index');

    Route::get('/{slug}-{id}', function (string $slug, string $id, Request $request){
        return [
            "slug" => $slug,
            "id"=> $id,
            "name" => $request->input("name"),
        ];
    })->where([
            'id'=>'[0-9]+',
            'slug'=>'[a-z0-9\-]+'
        ])->name('show');
});


