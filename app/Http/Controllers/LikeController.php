<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->likes += 1;
        $post->save();

        return response()->json(['message' => 'Liked', 'likes' => $post->likes]);
    }
}

