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
        $validate =$request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        Post::create($validate);
        return redirect()->route('post.index')->with('message','post saved');
    }
    public function show(Post $post)
    {
        return view('post.show',['post'=>$post,'categories'=>Category::all()]);
    }

    public function edit(Post $post)
    {
        return view('post.edit',['post'=>$post ,'categories'=>Category::all()]);
    }
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        $post->update($validate);
        return redirect()->route('post.index')->with('message','post successfully changed');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message','post successfully deleted');
    }
}
