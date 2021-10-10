<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    
    public function store(Post $post){

        // 다대다 관계는 또한 주어진 ID들의 추가 상태를 전환할 수 있는 toggle메소드를 제공.
        // 주어진 ID가 현재 추가되어 있으면 해제되고, 마찬가지로 현재 해제되어 있으면 추가된다.
        // toggle이 버튼을 누르면 보내고 또 누르면 데이터 지워지고 그런거?
        // dd($post->likers.':'.auth()->user());

        return $post->likers()->toggle(auth()->user());  
    }
}
