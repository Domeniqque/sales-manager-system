<?php

function dd($value, ...$others) {
    echo '<pre style="margin: 20px; padding: 12px">';

    !empty($others) ? print_r($others[0]."\n") : null;
    var_dump($value);

    die();
}

function view($name, $layouts = 'default') {
    $path = str_replace('.', '/', $name);
    if (file_exists("./app/Views/{$path}.view.php")) {
        $body = $name;
        $page = require "./app/Views/layouts/{$layouts}.view.php";

        return $page;
    }
}

function _include($name) {
    $path = str_replace('.', '/', $name);
    include "./app/Views/{$path}.view.php";
}

function asset($path) {
    if (file_exists("public/{$path}"))
        echo "/public/{$path}";
}