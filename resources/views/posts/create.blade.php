<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog-post.create</title>
        <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/create.css') }}">
    </head>

    <body>
        <h1 class="blog">Blog Name</h1>
    
        <form action="/posts" method="POST">
      
            <!--リクエストの偽造を防ぐ-->
            @csrf
                
            <p>タイトル</p>
            <input type="text" name="post[title]" placeholder="タイトル">
            <!--サーバー側でpost配列のキー="title"として扱うことができる-->
        
            <p>本文</p>
            <textarea name="post[body]" placeholder="本文"></textarea>
        
            <input class="post-submit" type="submit" value="投稿">
        
        </form>
            
        <div class="return">
            <a href="/">投稿画面一覧に戻る</a>
        </div>
    
    </body>
  
</html>
