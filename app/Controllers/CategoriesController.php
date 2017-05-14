<?php

namespace App\Controllers;

use App\Repositories\CategoriesRepositories;
use Core\Request;

class CategoriesController
{
    /**
     * @var CategoriesRepositories
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new CategoriesRepositories;
    }

    public function index()
    {
        return view("categories.index", array(
            'categories' => $this->repository->all()
        ));
    }

    public function store()
    {
        $message = $this->repository->save(Request::all());

        return view('categories.index', ["message" => $message]);
    }
}