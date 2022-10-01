<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class CommentController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([
            'text' => 'required|max:255',
            'post_id'=>'required|numeric|exists:posts,id'
        ]);
        Comment::create($validate);
        return redirect()->back()->with('message','comment successfully sent');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit',['comment'=>$comment,'categories'=>Category::all()]);
    }
    public function update(Request $request, Comment $comment)
    {
//        $validate = $request->validate([
//            'text' => 'required|max:255',
//            'post_id'=>'required|numeric|exists:posts,id'+$request->post->id
//        ]);
//        dd($comment,$request);
        $comment->update([
            'text' => $request->text,
            'post_id'=>$comment->post->id
        ]);
        return redirect()->route('post.show',$comment->post->id)->with('message','your comment successfully edited');
    }
    public function destroy(Comment $com){
        $com->delete();
        return redirect()->back()->with('message','Your comment successfully deleted');
    }
//
}
