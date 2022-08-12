<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //judul
        $title= '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')) {
            $author = User::firstWhere('name', request('author'));
            $title = ' by ' . $author->name;
        }




        return view('posts',
    [
        "title" => "All Posts" . $title,
        "active" => 'posts',
        "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(7)->
        withQueryString()
    ]);
    }

    public function show(post $post)
    {
        return view('post',[
            "title" => "Single Post",
            "active" => 'posts',
            "post" =>$post
        ]);
    }
}
