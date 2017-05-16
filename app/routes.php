<?php

$router->get('products', 'ProductsController@index');
$router->get('products/create', 'ProductsController@create');
$router->post('products', 'ProductsController@store');


$router->get('categories', 'CategoriesController@index');
$router->get('categories/create', 'CategoriesController@create');
$router->post('categories', 'CategoriesController@store');
$router->post('categories/delete', 'CategoriesController@delete');

$router->get('clients', 'ClientsController@index');
$router->get('clients/create', 'ClientsController@create');
$router->post('clients', 'ClientsController@store');
$router->post('clients/delete', 'ClientsController@delete');

$router->get('requests', 'RequestsController@index');
$router->post('requests', 'RequestsController@createCart');
$router->get('requests/create', 'RequestsController@create');
$router->get('requests/cart', 'RequestsController@cart');