<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


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
}
