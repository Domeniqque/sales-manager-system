<?php

namespace Core\Database;

use Core\App;

class Transaction
{
    /**
     * @var \PDO
     */
    private static $connection = null;


    /**
     * Abre uma nova conexão com o banco se não houver uma conexão ativa
     * e abre uma nova transação
     * @return void
     */
    private static function open()
    {
        static::$connection = Connection::make(App::get("config")['database']);
        self::$connection->beginTransaction();
    }

    /**
     * Retorna uma conexão com o banco
     * @return \PDO
     */
    public static function get()
    {
        if (!self::hasActiveConnection()) {
            self::open();
        }

        return self::$connection;
    }

    /**
     * @return bool
     */
    private static function hasActiveConnection()
    {
        return !empty(self::$connection);
    }


    /**
     * Desfaz as operações realizadas
     * @return void
     */
    public static function rollback()
    {
        if (self::hasActiveConnection()) {
            self::$connection->rollBack();
            self::$connection = null;
        }
    }

    /**
     * @return void
     */
    public static function close()
    {
        if (self::hasActiveConnection()) {
            self::$connection->commit();
            self::$connection = null;
        }
    }


}