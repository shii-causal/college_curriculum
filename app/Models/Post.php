<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //データを論理削除する
    use SoftDeletes;

    //データの登録を可能にするカラムの指定
    protected $fillable = [
        'title',
        'body',
        "category_id",
    ];
    
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、paginateで一度に表示する件数をカテゴリーごとに制限する
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //Categoriesに対するリレーション
    Public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
