<?php

namespace App\Controllers;

use App\Repositories\ProductsRepositories;

class ProductsController
{
    /**
     * @var ProductsRepositories
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new ProductsRepositories;
    }

    public function index()
    {
        dd($this->repository->all());
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        dd($_POST);
    }
}