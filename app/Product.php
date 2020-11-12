<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function store(){
        $this->belongsTo(Store::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_products');
    }
}
