<?php

namespace App\Models;

use Core\Contracts\Models;

class Product extends Models
{
    protected $table = 'products';

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }
}