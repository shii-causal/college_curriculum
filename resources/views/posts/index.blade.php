<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Blog-posts</title>
    <link rel="stylesheet" href="{{ secure_asset('/assets/css/posts/index.css') }}">
  </head>

  <body>
    <h1 class="blog">Blog Name</h1>
    
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
    
            </div>
            
        @endforeach
    </div>
    
    <div class="paginate">
        <!--ページネーションの表示-->
        {{ $posts->links() }}
    </div>
            
  </body>
  
</html>
