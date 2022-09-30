<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create([
            'text'=>$request->text,
            'post_id'=>$request->post_id,
        ]);
        return redirect()->back();
    }
    public function destroy(Comment $com)
    {
        $com->delete();
        return redirect()->back();
    }
}
