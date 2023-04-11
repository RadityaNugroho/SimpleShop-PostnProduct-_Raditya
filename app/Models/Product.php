<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = ['id'];


    public function fkCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function fkProductDetail(){
        return $this->hasOne(ProductDetail::class, 'product_id', 'id');
    }
}
