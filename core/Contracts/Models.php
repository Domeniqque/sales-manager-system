<?php

namespace Core\Contracts;


use Core\Contracts\Interfaces\ModelInterface;
use Core\Database\QueryBuilder;

class Models extends QueryBuilder implements ModelInterface
{

    /**
     * @param Models $class
     * @param $pivot
     * @return mixed
     */
    public function hasOne($class, $pivot)
    {
        return new $class->table;
    }
}