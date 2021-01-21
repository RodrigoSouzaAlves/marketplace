<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
      'name',
      'description',
      'body',
      'price',
      'slug',

    ];
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function categories(){
        //Relacionamento relacional N : N
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function photos(){
        return $this->hasMany(ProductPhoto::class);
    }
}
