<?php

namespace App\Repositories;


use App\Models\Product;

class ProductsRepositories
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function all()
    {
        return $this->model->select(['*'])->get();
    }

}