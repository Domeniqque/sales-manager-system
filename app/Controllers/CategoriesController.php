<?php

namespace App\Controllers;

use App\Repositories\CategoriesRepository;
use Core\Request;

class CategoriesController
{
    /**
     * @var CategoriesRepository
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new CategoriesRepository;
    }

    /**
     * Require the view
     */
    public function index()
    {
        return view("categories.index", array(
            'categories' => $this->repository->all()
        ));
    }

    /**
     * Store a category
     */
    public function store()
    {

        $response = $this->repository->save(Request::all());

        if ($response)
            message()->flash($response["type"], $response["message"]);

        return redirectTo("categories");
    }

    /**
     * Delete
     */
    public function delete()
    {
        $response = $this->repository->delete((int) Request::get('id'));

        if ($response)
            message()->flash($response["type"], $response["message"]);

        redirectTo("categories");
    }
}