<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        //show posts
        $posts = Post::latest()->get();
        return view('guests.posts.index',compact('posts'));
    }
}
