<?php

$router->get('products', 'ProductsController@index');
$router->get('products/create', 'ProductsController@create');
$router->post('products', 'ProductsController@store');


$router->get('categories', 'CategoriesController@index');
$router->get('categories/create', 'CategoriesController@create');
$router->post('categories', 'CategoriesController@store');
$router->post('categories/delete', 'CategoriesController@delete');