<?php

namespace App\Models;


use Core\Contracts\Models;

class Client extends Models
{
    protected $table = 'clients';

    /**
     * @return array
     */
    public function shopping()
    {
        return $this->hasMany(Sale::class, 'client_id');
    }
}