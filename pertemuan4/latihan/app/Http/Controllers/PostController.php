<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category')->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load(['author', 'category']);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->with('author', 'category')
            ->limit(3)
            ->get();
        return view('detailpost', compact('post', 'relatedPosts'));
    }
}
