<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($id){

    }
    public function index($id){

        $comments = Comment::where('post_id' , $id)->latest('created_at');

        
    }
    public function destroy($id){

    }
    public function update(){

    }
}
