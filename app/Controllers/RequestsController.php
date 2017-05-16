<?php

namespace App\Controllers;

use App\Repositories\ClientsRepositories;
use App\Repositories\RequestsRepositories;
use Core\Request;

class RequestsController
{
    /**
     * @var RequestsRepositories
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new RequestsRepositories;
    }

    public function index()
    {
        return view("requests.index", array(
            'clients' => (new ClientsRepositories)->all(),
        ));
    }

    /**
     * @return mixed
     */
    public function createCart()
    {
        $client_id = Request::get("client_id");
        $this->repository->openCart($client_id);

        return view('requests.create', array("client_id" => $client_id));
    }

}