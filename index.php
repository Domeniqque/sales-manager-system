<?php

require "./vendor/autoload.php";
require "./core/bootstrap.php";

use Core\{App, Request};

App::get('router')
    ->direct(Request::uri(), Request::method());