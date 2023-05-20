<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cause extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ([
        'title',
        'date',
        'exp_donation',
        'description',
        'author_id',
        'category_id',
        'thumbnail',
    ]);

    public function category(){
        return $this->belongsTo(Category::class ,'category_id', 'id');
    }
    public function author(){
        return $this->belongsTo(User::class ,'author_id', 'id');
    }
}
