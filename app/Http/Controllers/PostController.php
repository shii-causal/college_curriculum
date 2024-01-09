<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


//Post一覧を表示する
class PostController extends Controller
{
	//インポートしたPostをインスタンス化して$postとして使用
	public function index(Post $post)
	{
		//index.blade.phpにコントローラーで取得したデータを渡す
		//index内では変数"posts"と定義され、取得したデータを利用する
		return view('posts/index')->with(["posts" => $post->get()]);
	}
}
