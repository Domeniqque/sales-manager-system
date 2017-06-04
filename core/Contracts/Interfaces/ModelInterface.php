<?php
namespace Core\Contracts\Interfaces;


interface ModelInterface
{
    /**
     * @param $class
     * @param $pivot
     * @return ModelInterface
     */
    public function hasOne($class, $pivot);

    /**
     * @param $class
     * @param $primaryPivot
     * @param $pivot
     * @return ModelInterface
     */
    public function belongsTo($class, $primaryPivot, $pivot);

    /**
     * @param $class
     * @param $pivot
     * @return ModelInterface
     */
    public function hasMany($class, $pivot);
}