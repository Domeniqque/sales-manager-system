<?php
namespace Core\Contracts\Interfaces;

interface ModelInterface
{
    /**
     * @param $class
     * @param $pivot
     * @return mixed
     */
    public function hasOne($class, $pivot);
}