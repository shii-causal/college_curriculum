<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;    //追加
use App\Http\Controllers\CategoryController;

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

//Post一覧を表示
Route::get('/', [PostController::class, 'index']);

//Post作成画面の表示
//Post詳細画面が先だと、{poat}にcreateが代入されてエラーになる
Route::get('/posts/create', [PostController::class, 'create']);

//post作成画面で入力を受け取り、DBに保存する
Route::post('/posts', [PostController::class, 'store']);

//Post詳細画面の表示
//{post}に対象データのidが代入される
Route::get('/posts/{post}', [PostController::class, 'show']);

//Post編集画面の表示
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

//Post編集画面の変更受け取り
Route::put('/posts/{post}', [PostController::class, 'update']);

//Post一覧画面でPostを削除する
Route::delete('/posts/{post}', [PostController::class, 'delete']);

//カテゴリーごとにPost一覧を表示する
Route::get('/categories/{category}', [CategoryController::class, 'index']);