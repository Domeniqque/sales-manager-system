<?php
return [
    "app_url" => "localhost:8080",
    "database" => [
        "name" => "gestao_produto",
        "username" => "root",
        "password" => "123",
        "connection" => "mysql:host=127.0.0.1",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];