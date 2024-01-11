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
    
                </div>
            
            @endforeach
        </div>
    
        <div class="paginate">
            <!--ページネーションの表示-->
            {{ $posts->links() }}
        </div>
            
    </body>
  
</html>
