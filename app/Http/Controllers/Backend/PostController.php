<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category'])->get();
        return view('pages.admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.post.form', [
            'action' => route('posts.store'),
            'title' => old('title'),
            'slug' => old('slug'),
            'content' => old('content'),
            'category' => old('category'),
            'categories' => $categories,
            'status'=> old('status'),
            'type' => 'add'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png'],
            'category' => ['required'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $postValue = $request->image;
            $filename = time() . date('Y-m-d') . '.' . $postValue->getClientOriginalExtension();
            $request->image->storeAs('post', $filename, 'public');
        }
        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $filename,
            'category_id' => $request->category,
            'status' => $request->status,
            'user_id'=> Auth::user()->id
        ]);
        Alert::toast('Post added Successfully', 'success');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('pages.admin.post.form', [
            'action' => route('posts.update', $id),
            'title' => old('title', $post->title),
            'slug' => old('slug', $post->slug),
            'content' => old('content', $post->content),
            'category' => old('category', $post->category_id),
            'categories' => $categories,
            'status'=> old('status', $post->status),
            'type' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'image' => ['mimes:jpg,jpeg,png'],
            'category' => ['required'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $postValue = $request->image;
            $filename = time() . date('Y-m-d') . '.' . $postValue->getClientOriginalExtension();
            $request->image->storeAs('post', $filename, 'public');
        }
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'image' => $request->has('image') ? $filename : $post->image,
            'category_id' => $request->category,
            'status' => $request->status,
            'user_id'=> Auth::user()->id
        ]);
        Alert::toast('Post updated Successfully', 'success');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(file_exists(public_path('storage/post/' . $post->image))) {
            unlink(public_path('storage/post/'. $post->image));
        }
        $post->delete();

        Alert::toast('Data deleted successfully', 'success');
        return redirect()->route('posts.index');
    }
}
