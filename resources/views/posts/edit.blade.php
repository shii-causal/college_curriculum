<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog-post.edit</title>
        <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/edit.css') }}">
    </head>

    <body>
        <h1 class="blog">Blog Name</h1>
    
        <form action="/posts" method="POST">

            @csrf
                
            <p>タイトル</p>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}">
        
            <p class="body">本文</p>
            <textarea name="post[body]" placeholder="本文" value="{{ $post->body }}"></textarea><br>

            <input class="post-submit" type="submit" value="保存">
        
        </form>
            
        <div class="return">
            <a href="/">投稿画面一覧に戻る</a>
        </div>
    
    </body>
  
</html>