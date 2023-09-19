<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('writer:id,username')->get();
        return response()->json(['data' => $posts]);
    }

    public function show($id)
    {
        $post = Post::with('writer')->findOrfail($id);

        //  jika cuman mau pililh data dari user bisa begini
        // $post = Post::with('writer:id,username')->findOrfail($id);
        return response()->json(['data' => $post]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'news_content' => 'required'
        ]);

        $request['author'] = Auth::user()->id;
        $post = Post::create($request->all());
        return response()->json([$post->loadMissing('writer:id,username')]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'news_content' => 'required'
        ]);

        $post = Post::findOrfail($id);
        $post->update($request->all());
        return response()->json([$post->loadMissing('writer:id,username')]);
    }

    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        $post->delete();
        return response()->json([$post->loadMissing('writer:id,username')]);
    }
}
