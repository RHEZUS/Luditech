<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'category_id',
    ];
    public function article()
    {
        return $this->belongsTo(Article::class, "article_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(Tag::class, "category_id", "id");
    }
}
