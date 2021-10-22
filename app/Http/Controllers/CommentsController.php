<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store( Request $request,$id){

        $comment = new Comment;
        $comment->$content = $request->content;
        $comment->$user_id = auth()->user()->id;
        $comment->post_id = $id;
        $comment->save();

        return redirect()->route('comment.index', ['id'=>$id]);

    }
    public function index($id){

        $comments = Comment::where('post_id' , $id)->latest('created_at');
    }
    public function destroy($id){

    }
    public function update(Request $request, $comment_id){

        $comment = Comment::find($comment_id);
        $comment->update([
            'comment' => $comment,
        ]);
        return $comment;

    }
}
