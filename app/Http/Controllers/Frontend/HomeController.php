<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user'])->where('status', 'published')->skip(0)->limit(9)->orderBy('id', 'DESC')->get();

        return view('pages.index', [
            'posts' => $posts,
        ]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'user'])->firstOrFail();
        $posts = Post::find($post->id);
        $previous = $posts->previous();
        $next = $posts->next();
        return view('pages.detail-post', [
            'post' => $post,
            'previous' => $previous,
            'next' => $next
        ]);
    }
}
