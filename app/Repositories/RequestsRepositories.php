<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Request;

class RequestsRepositories
{
    /**
     * @var Request
     */
    protected $model;

    /**
     * @var
     */
    private $key_session = "cart";

    /**
     * @var ProductsRepositories
     */
    protected $productRepository;


    /**
     * ProductsRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new Request;
        $this->productRepository = new ProductsRepositories;
        session_start();
        $_SESSION[$this->key_session] = array();
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->model->select(['*'])->get();
    }


    /**
     * @param $product_id
     * @param $quantity
     * @param $client_id
     * @return array
     */
    public function addProduct($product_id, $quantity, $client_id)
    {
        try {
            $product = $this->productRepository->find($product_id);

            $this->putInSession($product, $quantity, $client_id);

            return ["type" => "success", "message" => "Adicionado com successo!"];
        } catch (\Exception $e) {

            return ["type" => "error", "message" => $e->getMessage()];
        }
    }

    /**
     * @param Product $product
     * @param $quantity
     * @param $client_id
     */
    private function putInSession(Product $product, $quantity, $client_id)
    {
        $_SESSION[$this->key_session][$client_id] = [
            "produto" => $product, "quantity" => $quantity
        ];
    }

    /**
     * @param $client_id
     * @return void
     */
    public function openCart($client_id)
    {
        $_SESSION[$this->key_session][$client_id]['requests'] = array();
    }

    /**
     * @param $data
     * @return array
     */
    private function format($data)
    {
        return [
            "client_id" => (int) $data["client_id"],
            "created_at" => date("Y-m-d H:i:s"),
            "total" => (int) $data["total"]
        ];
    }

    /**
     * @param $client_id
     * @return mixed
     */
    public function getCartClient($client_id)
    {
        return $_SESSION[$this->key_session][$client_id]["requests"];
    }

}