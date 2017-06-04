<?php

namespace Core\Contracts;


use Core\Contracts\Interfaces\ModelInterface;
use Core\Database\QueryBuilder;

class Models extends QueryBuilder implements ModelInterface
{

    /**
     * @param $class
     * @param $pivot
     * @return mixed
     * @throws \Exception
     */
    public function hasOne($class, $pivot)
    {
        $tableOfRelation = $this->getTableNameFromClass($class);

        $sql = "SELECT t2.* FROM 
                    {$this->getTable()} t1
                    INNER JOIN $tableOfRelation t2 ON t1.{$pivot} = t2.id
                    WHERE t2.id = {$this->$pivot}";

        $statement = $this->openConnection()->prepare($sql);
        $statement->execute();

        return $statement->fetchObject($class) ?? null;

    }


    /**
     * @param $class
     * @param $primaryPivot
     * @param $pivot
     * @return mixed|null
     */
    public function belongsTo($class, $primaryPivot, $pivot)
    {
        $tableOfRelation = $this->getTableNameFromClass($class);

        $sql = "SELECT t2.* FROM 
                    {$this->getTable()} t1
                    INNER JOIN $tableOfRelation t2 ON t1.{$pivot} = t2.{$primaryPivot}
                    WHERE t2.$primaryPivot = {$this->$pivot}";

        $statement = $this->openConnection()->prepare($sql);
        $statement->execute();

        return $statement->fetchObject($class) ?? null;
    }

    /**
     * @param $class
     * @param $pivot
     * @return array
     */
    public function hasMany($class, $pivot)
    {
        $tableOfRelation = $this->getTableNameFromClass($class);

        $sql = "SELECT t2.* FROM {$this->getTable()} t1 
                  JOIN $tableOfRelation t2 ON t1.id = t2.$pivot
                  WHERE t2.$pivot = {$this->id}";

        $statement = $this->openConnection()->prepare($sql);
        $statement->execute();

        $objects = [];

        while ($object = $statement->fetchObject($class))
            $objects[] = $object;

        return $objects;

    }

    /**
     * @param $class
     * @return mixed
     */
    private function getTableNameFromClass($class)
    {
        $this->classExists($class);

        return (new $class)->getTable();
    }

    /**
     * @param $class
     * @throws \Exception
     */
    private function classExists($class)
    {
        if (!class_exists($class))
            throw new \Exception("Class not found!");
    }


}