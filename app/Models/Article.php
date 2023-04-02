<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,SoftDeletes;
    public function tags()
    {
        return $this->hasMany(ArticleTag::class, "article_id", "id");
    }
    public function categories()
    {
        return $this->hasMany(ArticleCategory::class, "article_id", "id");
    }
}
