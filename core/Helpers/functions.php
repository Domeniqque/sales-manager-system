<?php

function dd($value, ...$others) {
    echo '<pre style="margin: 20px; padding: 12px">';

    !empty($others) ? print_r($others[0]."\n") : null;
    var_dump($value);

    die();
}

function view($bodyName, $data = [], $layout = 'default') {
    $bodyName = str_replace('.', '/', $bodyName);

    if (!file_exists("./app/Views/{$bodyName}.view.php")) {
        die("View {$bodyName} not found!");
    }

    if (!file_exists("./app/Views/layouts/{$layout}.view.php")) {
        die("View {$layout} not found!");
    }

    require "./app/Views/layouts/{$layout}.view.php";
}

function _include($name, $data = null) {
    $path = str_replace('.', '/', $name);
    if (!is_null($data)) extract($data);
    include "./app/Views/{$path}.view.php";
}

function asset($path) {
    if (file_exists("public/{$path}"))
        echo "/public/{$path}";
}

function priceFormat($number) {
    return "R$" . str_replace(".", ',', $number);
}

function url($url) {
    return "http://" . \Core\App::get('config')['app_url'] . "/" . $url;
}

function redirectTo($uri, $requestType = 'GET') {
    if (! \Core\App::get('router')->exists($uri, $requestType)) {
        die('Route not found!');
    }

    header("Location: " . url($uri));
    exit;
}

function message($key = null, $value = null) {
    $messageClass = (new \Core\Helpers\Messages);

    if (is_null($key) && is_null($value)) return $messageClass;
    if (is_null($value)) return $messageClass->get($key);

    $messageClass->put($key, $value);
}
