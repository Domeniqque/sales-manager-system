<?php

namespace App\Controllers;

use App\Repositories\ClientsRepository;
use App\Services\SaleService;
use Core\Request;

class SalesController
{
    /**
     * @var SaleService
     */
    protected $saleService;

    public function __construct()
    {
        $this->saleService = new SaleService;
    }

    public function index()
    {
        return view("sales.index", array(
            'clients' => (new ClientsRepository)->all(),
        ));
    }

    /**
     * @return void
     * @redirect sales/cart
     */
    public function createCart()
    {
        $this->saleService->initSale($client_id = Request::get('client_id'));

        redirectTo("sales/cart", compact("client_id"));
    }

    public function cart()
    {
        return view("sales.cart",
            $this->saleService->getCart(Request::get("client_id"), Request::get("sale_id"))
        );
    }

    public function addItem()
    {
        $sale = $this->saleService->addProduct(
            Request::get('client_id'),
            Request::get('product_id'),
            Request::get('quantity'),
            Request::get('sale_id')
        );

        redirectTo("sales/cart", $sale);
    }

    public function removeItem()
    {
        $sale = $this->saleService->removeItemAndReturnThisSale(
            Request::get("sale_id"),
            Request::get("item_id")
        );

        redirectTo("sales/cart", array(
            "sale_id" => $sale->id,
            "client_id" => $sale->client_id
        ));
    }

    public function save()
    {

    }

}