<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Create() {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function Store() {
        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'category_id' => request('category_id'),
            'content' => request('content')
        ]);

        return redirect('/Post/Create');
        
    }
}
