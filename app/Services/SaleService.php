<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Repositories\ClientsRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\SaleItemsRepository;
use App\Repositories\SalesRepository;
use Core\Request;

class SaleService
{
    /**
     * @var SalesRepository
     */
    protected $salesRepository;
    /**
     * @var ProductsRepository
     */
    protected $productsRepository;

    /**
     * @var SaleItemsRepository
     */
    protected $saleItemsRepository;

    /**
     * @var ClientsRepository
     */
    protected $clientsRepository;

    public function __construct()
    {
        $this->salesRepository = new SalesRepository;
        $this->saleItemsRepository = new SaleItemsRepository;
        $this->productsRepository = new ProductsRepository;
        $this->clientsRepository = new ClientsRepository;
    }

    public function getSalesClientsAndDashBoard()
    {
        $clients = $this->clientsRepository->all();
        $sales = $this->salesRepository->all();
        $panel["sales_in_month"] = $this->salesRepository->getSalesInMonth((new \DateTime())->format('m'));

        return compact("clients", "sales");
    }

    /**
     * Inicia uma venda adicionando o cliente na sessão
     * para posteriores inserçoes no banco
     *
     * @param $client_id
     * @return void
     */
    public function initSale($client_id)
    {
        $this->putClientInSession(
            $this->clientsRepository->find($client_id)
        );
    }

    /**
     * @param $client_id
     * @return object
     */
    public function getClientView($client_id)
    {
        $client = $this->getClientOfSession($client_id);

        if (empty($client)) {
            $client = $this->clientsRepository->find($client_id);
            $this->putClientInSession($client);
        }

        return (object) [
            "id" => $client->id,
            "name" => $client->name,
            "cpf" => $client->cpf,
            "email" => $client->email,
        ];
    }

    /**
     * @param $client_id
     * @return mixed
     */
    public function getClientOfSession($client_id)
    {
        return $_SESSION["cart"]["clients"][$client_id];
    }

    /**
     * @param $sale_id
     * @return mixed
     */
    public function getSaleOfSession($sale_id)
    {
        return $_SESSION["cart"]["sales"][$sale_id] ?? null;
    }

    /**
     * @param Client $client
     */
    private function putClientInSession(Client $client)
    {
        $_SESSION["cart"]["clients"][$client->id] = $client;
    }


    /**
     * @param $client_id
     * @param $sale_id
     * @return array
     */
    public function getCart($client_id, $sale_id = '')
    {
        $products = $this->productsRepository->list();
        $client = $this->getClientView($client_id);
        $sale = empty($sale_id) ? [] : $this->salesRepository->find($sale_id);

        return compact("products", "client", "sale", "sale_id");
    }

    /**
     * @param $client_id
     * @param $product_id
     * @param $quantity
     * @param string $sale_id
     * @return mixed
     */
    public function addProduct($client_id, $product_id, $quantity, $sale_id = '')
    {
        $sale = $this->getOrCreateSale($client_id, $sale_id);

        $product = $this->productsRepository->find($product_id);

        $this->saleItemsRepository->save(
            array_merge(
                compact("product_id", "quantity"), 
                ["value" => $product->price, "sale_id" => $sale->id]
            )
        );

        $value = $this->calculateTotalValue($product->price, $sale->value, $quantity);

        $this->salesRepository->update($sale->id, compact("value"));

        message()->flash("success", "O produto <b>{$product->name}</b> foi adicionado ao carrinho!");

        return [
            "sale_id" => $sale->id,
            "client_id" => $client_id
        ];
    }

    /**
     * @param $sale_id
     * @param $item_id
     * @return object
     */
    public function removeItemAndReturnThisSale($sale_id, $item_id)
    {
        $sale = $this->salesRepository->find($sale_id);

        $item = $this->saleItemsRepository->delete($item_id);

        $product = $this->productsRepository->find($item->product_id);

        $this->salesRepository->update($sale->id, array(
            "value" => $this->updateSaleValue($sale->value, $product->price, $item->quantity)
        ));

        message()->flash("success", "O produto <b>{$product->name}</b> foi removido do carrinho!");

        return $sale;
    }

    /**
     * @param $client_id
     * @param string $sale_id
     * @return mixed|object
     */
    private function getOrCreateSale($client_id, $sale_id)
    {
        $sale = $this->salesRepository->find($sale_id);

        return $sale ? $sale : $this->salesRepository->create(compact("client_id"));
    }

    /**
     * @param $product_value
     * @param $current_sale_value
     * @param $quantity
     * @return float
     */
    private function calculateTotalValue($product_value, $current_sale_value, $quantity)
    {
        return floatval($current_sale_value + ($product_value * $quantity));
    }

    /**
     * @param $current_sale_value
     * @param $product_value
     * @param $quantity
     * @return float
     */
    public function updateSaleValue($current_sale_value, $product_value, $quantity)
    {
        return floatval($current_sale_value - ($product_value * $quantity));
    }


}