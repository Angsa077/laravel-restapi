<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json(['data' => $posts]);
    }

    public function show($id)
    {
        $post = Post::with('writer')->findOrfail($id);

        //  jika cuman mau pililh data dari user bisa begini
        // $post = Post::with('writer:id,username')->findOrfail($id);
        return response()->json(['data' => $post]);
    }
}