<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // trait
    
    // 모델에 배열을 직접 전달하여 데베를 변경할 때 개발자가 명시적으로 입력이 가능한 컬럼을 지정해 주어야 한다.
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
    ];

    public function user(){
        // User와 Post의 관계 정의
        // 1:n 관계
        // User은 hasMany
        // Post는 belongsto
        return $this->belongsTo(User::class);
        // 함수를 정의할 때 이름을 테이블 이름을 따오면 따로 외래키를 줄 필요가 없다.
    }

    public function liker(){
        return $this->belongsToMany(User::class);
    }

}
