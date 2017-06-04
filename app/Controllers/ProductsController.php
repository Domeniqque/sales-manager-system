<?php

namespace App\Controllers;

use App\Repositories\ProductsRepository;
use Core\Request;

class ProductsController
{
    /**
     * @var ProductsRepository
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new ProductsRepository;
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

        message()->flash($response->type, $response->message);

        return redirectTo("products");
    }

    public function edit()
    {
        $response = $this->repository->find(Request::get('id'));

        if (isset($response->type) && $response->type === "error") {
            message()->flash($response->type, $response->message);
            redirectTo("products");
        }

        return view('products.edit', array(
            'product' => $response,
            'categories' => $this->repository->listCategories()
        ));
    }

    public function update()
    {
        $response = $this->repository->update(
            Request::get('product_id'),
            Request::all()
        );

        message()->flash($response->type, $response->message);

        return redirectTo("products");
    }
}