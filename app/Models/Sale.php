<?php

namespace App\Models;

use Core\Contracts\Models;

class Sale extends Models
{
    protected $table = 'sales';

    public function items()
    {
        return $this->hasMany(SaleItems::class, 'sale_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'client_id');
    }


}