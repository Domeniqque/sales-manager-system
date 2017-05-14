<?php

namespace Core;


class App
{
    /**
     * @var array
     */
    protected static $registry = [];

    /**
     * Registra instâncias de objetos da aplicação
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        self::$registry[$key] = $value;
    }


    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function get($key)
    {
        if (! array_key_exists($key, self::$registry)) {
            throw new \Exception("No {$key} is bound in the container.");
        }
        return self::$registry[$key];
    }
}