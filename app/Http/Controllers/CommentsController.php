<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,$id){

        // 데이터베이스에 저장하는 방법
        // 1. save()
        // 2. Comment::create([]);

        $this->validate($request, [
            'comment' => 'required',
            // 'email' => 'required|email|unique:comments',
        ]);

        $comment = Comment::create([
                        'comment' => $request->content,
                        'user_id' => auth()->user()->id, // auth 헬퍼 사용.
                        'post_id' => $id
                    ]);

        return $comment;

    }
    public function index($id){

        $comments = Comment::where('post_id' , $id)->latest('created_at')->get();
        return $comments;
    }
    public function destroy($commentId){

        $comment = Comment::find($commentId);
        $comment->delete();
        
        return $comment;
    }
    public function update(Request $request, $comment_id){

        $request->validate(['comment'=>'required']);

        $comment = Comment::find($comment_id);
        $comment->update([
            'comment' => $request->content,
        ]);
        return $comment;
    }
}
