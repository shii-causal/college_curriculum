<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
            <!--サーバー側でpost配列のキー="title"として扱うことができる-->
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}">
            <!--バリデーションエラーの表示-->
            @if($errors->has('post.title'))
                @foreach ($errors->get('post.title') as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
        
            <p class="body">本文</p>
            <textarea name="post[body]" placeholder="本文" value="{{ old('post.body') }}"></textarea><br>
            @if($errors->has('post.body'))
                @foreach ($errors->get('post.body') as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif

            <input class="post-submit" type="submit" value="投稿">
        
        </form>
            
        <div class="return">
            <a href="/">投稿画面一覧に戻る</a>
        </div>
    
    </body>
  
</html>
