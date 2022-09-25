<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function postsByCategory(Category $category){
        return view('post.index',['allPost'=>$category->posts,'categories'=>Category::all()]);
    }


    public function index(Post $allPost)
    {
        return view('post.index',['allPost'=>$allPost::all(),'categories'=>Category::all()]);
    }


    public function create()
    {
        return view('post.create',['categories'=>Category::all()]);
    }

    public function store(Request $request,Post $post)
    {
        Post::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'category_id'=>$request->input('category_id'),
        ]);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {
        return view('post.show',['post'=>$post]);
    }

    public function edit(Post $post)
    {
        return view('post.edit',['post'=>$post ,'categories'=>Category::all()]);
    }
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'category_id'=>$request->input('category_id'),
        ]);
        return redirect()->route('post.index');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
