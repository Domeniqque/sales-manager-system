<?php

require "./vendor/autoload.php";
require "./core/helpers/functions.php";
use Core\{Request, Route};

$rotas = Route::load('app/routes.php')
                ->direct(Request::uri(), Request::method());
