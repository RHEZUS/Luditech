<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ([
        'name',
        'desc',
        'category_id',
        'thumbnail',
        'author_id',
        'quantity',
        'price',
        'discount_id'

    ]);

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function images(){

        return $this->hasMany(productImage::class,'product_id','id');

    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id','id');
    }
}
