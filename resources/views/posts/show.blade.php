<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog-post</title>
        <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/show.css') }}">
    </head>

    <!--headerの継承-->
    <x-app-layout>
        
    <body>
        <h1 class="blog">Blog Name</h1>
    
        <div class="post">
                
            <div class="heading">
                <h2 class="title">{{ $post->title }}</h2>
                <p class="date">{{ $post->updated_at }}</p>
            </div>
            
            <p class="body">{{ $post->body }}</p>
        
        </div>
    
        <div class="return">
            <a href="/">投稿画面一覧に戻る</a>
        </div>
            
    </body>
    
    </x-app-layout>
  
</html>
