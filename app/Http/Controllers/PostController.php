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
		    return $post->get();
	}
}
