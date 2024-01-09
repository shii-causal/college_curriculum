<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Blog-posts</title>
    <link rel="stylesheet" href="{{ secure_asset('/assets/css/index.css') }}">
  </head>

  <body>
    <h1 class="blog">Blog Name</h1>
    
    <div class="posts">
        
        @foreach ($posts as $post)
        
            <div class="post">
                
                <div class="heading">
                    <h2 class="title">{{ $post->title }}</h2>
                    <p class="date">{{ $post->updated_at }}</p>
                </div>
                <p class="body">{{ $post->body }}</p>
    
            </div>
            
        @endforeach    
            
    </div>
  </body>
  
</html>