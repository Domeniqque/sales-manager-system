<?php
require "Helpers/functions.php";

use Core\{App, Route};

session_start();

App::bind('config', require "config.php");
App::bind('router', Route::load('app/routes.php'));