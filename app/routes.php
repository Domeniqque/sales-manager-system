<?php

$router->get('products', 'ProductsController@index');
$router->get('products/create', 'ProductsController@create');
$router->post('products', 'ProductsController@store');