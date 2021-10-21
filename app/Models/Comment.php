<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];

    public function user(){
        // this는 이 객체를 말한다.
        // belongsTo는 user 모델에 속한다라는 의미.
        // comment table의 user_id 칼럼을 users table의 id다.
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
