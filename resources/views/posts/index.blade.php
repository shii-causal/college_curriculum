<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog-posts</title>
        <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/index.css') }}">
    </head>

    <body>
        <h1 class="blog">Blog Name</h1>
    
        <div class="create">
            <a href="posts/create">投稿する</a>
        </div>
    
        <div class="posts">
        
            @foreach ($posts as $post)
        
                <div class="post">
                
                    <div class="heading">
                        <h2 class="title">
                            <a href="posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class="date">{{ $post->updated_at }}</p>
                    </div>
                    <p class="body">{{ $post->body }}</p>
                    <a href="/posts/{{ $post->id }}/edit">編集する</a>
                    
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                    </form>
    
                </div>
            
            @endforeach
        </div>
    
        <div class="paginate">
            <!--ページネーションの表示-->
            {{ $posts->links() }}
        </div>
        
        <!--削除ダイアログの表示-->
        <script>
            function deletePost(id) {
                
                //最新の方法で動作します
                'use strict'

                if (confirm('本当に削除しますか？')) {
                    //フォームに送信する
                    document.getElementById(`form_${id}`).submit();
                }
                
            }
        </script>
    </body>
  
</html>
