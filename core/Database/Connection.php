<?php

namespace Core\Database;

class Connection
{
    /**
     * Retorna uma nova conexão com o banco
     * @param $config
     * @return \PDO
     */
    public static function make($config)
    {
        try {
            return new \PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}