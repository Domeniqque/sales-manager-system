<?php

namespace App\Models;

use Core\Contracts\Models;

class Product extends Models
{
    protected $table = 'products';

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id');
    }
}