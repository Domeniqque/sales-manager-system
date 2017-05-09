<?php

function dd(...$value) {
    echo '<pre style="margin: 20px; padding: 12px">';
    die(var_dump($value));
}

function view($name, $layouts = 'default') {
    $path = str_replace('.', '/', $name);
    if (file_exists("./app/views/{$path}.view.php")) {
        $body = $name;
        $page = require_once "./app/views/layouts/{$layouts}.view.php";

        return $page;
    }
}

function _include($name) {
    $path = str_replace('.', '/', $name);

    if (file_exists("./app/views/{$path}.view.php"))
        include "./app/views/{$path}.view.php";
}

function asset($path) {
    if (file_exists("./public/{$path}"))
        return "./public/{$path}";
}