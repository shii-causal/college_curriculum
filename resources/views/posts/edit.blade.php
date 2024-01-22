<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog-post.edit</title>
        <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/edit.css') }}">
    </head>

    <!--headerの継承-->
    <x-app-layout>

    <body>
        <h1 class="blog">Blog Name</h1>
    
        <form action="/posts/{{ $post->id }}" method="POST">

            @csrf
            <!--PUTリクエストとして送信する-->
            @method('PUT')    
            <p>タイトル</p>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}">
            @if($errors->has('post.title'))
                @foreach ($errors->get('post.title') as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
        
            <p class="body">本文</p>
            <!--textareaにvalueは設定できない-->
            <textarea name="post[body]" placeholder="本文">{{ $post->body }}</textarea><br>
            @if($errors->has('post.body'))
                @foreach ($errors->get('post.body') as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif

            <input class="post-submit" type="submit" value="保存">
        
        </form>
            
        <div class="return">
            <a href="/">投稿画面一覧に戻る</a>
        </div>
    
    </body>
    
    </x-app-layout>
  
</html>