<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function create()
    {
        return view("blog.create");
    }

    public function index(): View
    {
        
        return view('blog.index', [
        'posts' => Post::paginate(25)

        ]);
       
        // $validator = Validator::make(
        //     ["title"=> ""],
        //     ["title"=> "required|min:8"]
        // );
        // //dd($validator->fails());

        // $posts = Post::paginate(25);
        // return view('blog.index');
    }

    public function show(string $slug, string $id) : RedirectResponse | Post
    {
        $post = Post::findOrFail($id);
        if ($post->slug != $slug) {
            return to_route('blog.show', ['slug' => $post->slug,'id'=> $post->id]);
        }
        return $post;
    }
}
