<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('layouts.app');
});
Route::get('/hi', function () {
    return view('hello');
});

// resource가 호출되기 전에 사용할 컨트롤러를 등록해야한다.
// 라우터링크 리스트를 보려면 php artisan route:list
//Route::resource('/posts', PostsController::class);
