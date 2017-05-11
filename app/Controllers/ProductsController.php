<?php

namespace App\Controllers;

class ProductsController
{
    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        dd($_POST);
    }
}