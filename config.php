<?php
return [
    "app_url" => "localhost:8080",
    "database" => [
        "name" => "manager_system",
        "username" => "root",
        "password" => "123456",
        "connection" => "mysql:host=127.0.0.1",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];