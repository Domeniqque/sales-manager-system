<?php

namespace App\Models;

use Core\Contracts\Models;

class Request extends Models
{
    protected $table = 'requests';

    public function item() {
        return new ProductBasket;
    }
}