<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //データの登録を可能にするカラムの指定
    protected $fillable = [
        'title',
        'body',
    ];
    
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、paginateで一度に表示する件数を制限する
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}
