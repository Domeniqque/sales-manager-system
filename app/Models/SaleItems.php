<?php

namespace App\Models;

use Core\Contracts\Models;

class SaleItems extends Models
{
    protected $table = 'sales_items';

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'id', 'sale_id');
    }

}