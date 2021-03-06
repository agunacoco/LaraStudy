<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// resource는 네임이 지정되어 있기 때문에 name을 지정해주면 안된다.
Route::delete('/posts/{post}/image',[ PostsController::class,'deleteImage'])->middleware(['auth']);

Route::resource('/posts', PostsController::class)->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/like/{post}', [LikesController::class, 'store'])->middleware(['auth'])->name("like.store");

Route::get('/comment/{id}',[CommentsController::class, 'index'])->middleware(['auth'])->name('commment.index');
Route::post('/comment/{id}', [CommentsController::class, "store"])->middleware(['auth'])->name("comment.store");
Route::patch('/comment/{commentId}', [CommentsController::class, "update"])->middleware(['auth'])->name("comment.update");
Route::delete('/comment/{commentId}', [CommentsController::class, "destroy"])->middleware(['auth'])->name("comment.destroy");

// 요청을 보내는 http method 
// get 서버 자원을 읽을 때
// post 서버 자원을 변경할 때
// post 방식에서도 delete, patch, put이 있다.

// method spoofing
// _method : 'delete'
// _method : 'put'

// auth.php에 가면 로그인에 대한 라우터가 정의되어 있다.
require __DIR__.'/auth.php';


