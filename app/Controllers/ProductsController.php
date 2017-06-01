<?php

namespace App\Controllers;

use App\Repositories\ProductsRepositories;
use Core\Request;

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
        return view("products.index", array(
            'products' => $this->repository->all()
        ));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('products.create', array(
            'categories' => $this->repository->listCategories()
        ));
    }

    public function store()
    {
        $response = $this->repository->save(Request::all());

        message()->flash($response["type"], $response["message"]);

        return redirectTo("products");
    }

    public function edit()
    {
        $response = $this->repository->find(Request::get('id'));

        if ($response["error"]) {
            message()->flash($response["type"], $response["message"]);
            redirectTo("products");
        }

        return view('products.edit', array(
            'product' => $response['product'],
            'categories' => $this->repository->listCategories()
        ));
    }
}