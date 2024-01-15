<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //Postsとのリレーション
    //カテゴリーに複数のPostを収納する
    public function posts()
    {
        return $this->hasMany(Post::class);    
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、paginateで一度に表示する件数をカテゴリーごとに制限する
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}
