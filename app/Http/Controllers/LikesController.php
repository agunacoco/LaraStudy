<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    // 
    public function store(Post $post){
        $post->liker()->toggle(auth()->user());
    }
}
