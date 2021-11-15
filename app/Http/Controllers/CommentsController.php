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
                        'comment' => $request->input('comment'),
                        'user_id' => auth()->user()->id, // auth 헬퍼 사용.
                        'post_id' => $id
                    ]);

        return $comment;

    }
    public function index($id){

        $comments = Comment::with('user')->where('post_id' , $id)->latest('created_at')->paginate(3);
        return $comments;
    }
    public function destroy(Request $request, $commentId){

        $comment = Comment::find($commentId);
        if($request->user()->can('delete', $comment)){
            $comment->delete();
            return $comment;
        } else{
            abort(403);
        }
        return $comment;
    }
    public function update(Request $request, $comment_id){

        $request->validate(['comment'=>'required']);

        $comment = Comment::find($comment_id);
        $this->authorize('update', $comment);
        $comment->update([
            'comment' => $request->input('comment'),
        ]);
        return $comment;
    }
}
