<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post; //untuk menghubungkan controller ke model post. Bisa ditulis manual atau klik kanan expand class
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->category_name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('blog', [
            "title" => 'All Post' . $title,
            "active" => "blog",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(7)->withQueryString()
        ]);   
    }

    public function home()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->category_name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('home', [
            "title" => 'All Post' . $title,
            "active" => "home",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(7)->withQueryString()
        ]);   
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }
}


//route tanpa model binding
// public function show($id)
// {
//     return view('post', [
//         "title" => "Single Post",
//         "single_post" => Post::find($id)
//     ]);
// }