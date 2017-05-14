<?php

require "./vendor/autoload.php";
require "./core/bootstrap.php";

use Core\{Request, Route};

Route::load('app/routes.php')
    ->direct(Request::uri(), Request::method());