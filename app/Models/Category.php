<?php

namespace App\Models;


use Core\Contracts\Models;

class Category extends Models
{
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}