<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
	//post一覧画面の表示
	//インポートしたPostをインスタンス化して$postとして使用
	public function index(Post $post)
	{
		//index.blade.phpにコントローラーで取得したデータを渡す
		//index内では変数"posts"と定義され、取得したデータを利用する
		return view('posts/index')->with(["posts" => $post->getPaginateByLimit()]);
	}
	
	//Post詳細画面の表示
	//ルートパラメーターに代入されたidのテーブルデータがインスタンス化される
	public function show(Post $post)
	{
		return view('posts/show')->with(["post" => $post]);
	}
	
	//Post作成画面の表示
	public function create()
	{
		return view('posts/create');
	}
	
	//Post作成画面の入力を受け取り、入力内容を確認してDBに保存する
	public function store(PostRequest $request, Post $post)
	{
		//postsテーブルに登録
		//作成画面で受け取った$post配列を$input配列に代入する
		$input = $request['post'];
		//Postテーブルにキーごとに追加する
		$post->fill($input)->save();
		
		//作成したPostの表示
		return redirect('/posts/'.$post->id);
		
	}
	
	//Post編集画面の表示
	public function edit(Post $post) {
		return view('posts/edit')->with(["post" => $post]);
	}
	
	//Post編集画面の変更を受け取る
	public function update(PostRequest $request, Post $post)
	{
		$input = $request['post'];
		//updateではなく、fill->saveを用いて変更があったときのみ更新する
		$post->fill($input)->save();
		return redirect('/posts/'.$post->id);
	}
}
