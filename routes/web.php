<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ミドルウェアを指定し、認証していないユーザーのアクセスを制限する
Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    
    //Post一覧を表示
    Route::get('/', 'index')->name('index');

    //Post作成画面の表示
    //Post詳細画面が先だと、{poat}にcreateが代入されてエラーになる
    Route::get('/posts/create', 'create')->name('create');

    //post作成画面で入力を受け取り、DBに保存する
    Route::post('/posts', 'store')->name('store');

    //Post詳細画面の表示
    //{post}に対象データのidが代入される
    Route::get('/posts/{post}', 'show')->name('show');
    
    //Post編集画面の表示
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    
    //Post編集画面の変更受け取り
    Route::put('/posts/{post}', 'update')->name('update');
    
    //Post一覧画面でPostを削除する
    Route::delete('/posts/{post}', 'delete')->name('delete');
    
});

//カテゴリーごとにPost一覧を表示する
Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
