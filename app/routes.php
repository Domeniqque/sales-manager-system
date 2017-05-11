<?php

$router->get('products/create', 'ProductsController@create');
$router->post('products', 'ProductsController@store');