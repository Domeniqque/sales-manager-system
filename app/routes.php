<?php

$router->get('products', 'ProductsController@index');
$router->get('products/create', 'ProductsController@create');
$router->post('products', 'ProductsController@store');
$router->get('products/edit', 'ProductsController@edit');
$router->post('products/edit', 'ProductsController@update');


$router->get('categories', 'CategoriesController@index');
$router->get('categories/create', 'CategoriesController@create');
$router->post('categories', 'CategoriesController@store');
$router->post('categories/delete', 'CategoriesController@delete');

$router->get('clients', 'ClientsController@index');
$router->get('clients/create', 'ClientsController@create');
$router->post('clients', 'ClientsController@store');
$router->post('clients/delete', 'ClientsController@delete');

$router->get('sales', 'SalesController@index');
$router->post('sales', 'SalesController@createCart');
$router->get('sales/cart', 'SalesController@cart');
$router->post('sales/items/add', 'SalesController@addItem');
$router->post('sales/items/remove', 'SalesController@removeItem');
$router->post('sales/keep', 'SalesController@keep');
$router->post('sales/checkout', 'SalesController@checkout');
