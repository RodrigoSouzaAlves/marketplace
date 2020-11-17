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
        $this->belongsTo(Store::class);
    }

    public function categories(){
        //Relacionamento relacional N : N
        return $this->belongsToMany(Category::class, 'categories_products');
    }
}
