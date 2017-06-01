<?php

namespace App\Repositories;


use App\Models\Product;

class ProductsRepositories
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @var CategoriesRepositories
     */
    protected $categoriesRepository;

    /**
     * ProductsRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new Product;
        $this->categoriesRepository = new CategoriesRepositories;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->model->select(['*'])->get();
    }

    /**
     * @return array
     */
    public function listCategories()
    {
        return $this->categoriesRepository->all();
    }

    /**
     * @param $data
     * @return array
     */
    public function save($data)
    {
        try {
            $this->model->save(
                $this->format($data)
            );

            return ["type" => "success", "message" => "Produto salvo com sucesso!"];
        } catch (\Exception $e) {

            return ["type" => "error", "message" => $e->getMessage()];
        }
    }

    /**
     * @param $data
     * @return array
     */
    private function format($data)
    {
        return [
            "name" => trim((string) $data["name"]),
            "price" => (float) $data["price"],
            "weight" => (int) $data["weight"],
            "quantity" => (int) $data["quantity"],
            "category_id" => (int) $data["category_id"],
            "created_at" => date("Y-m-d H:i:s"),
            "description" => trim((string) $data["description"]),
        ];
    }

    /**
     * @param $id
     * @return array|object
     */
    public function find($id)
    {
        try {
            $product = $this->model->find($id);

            return $product ? ["type" => "success", "product" => $product]
                : ["type" => "error", "message" => "Produto não encotrado!"];
        } catch (\Exception $e) {
            return ["type" => "error", "message" => $e->getMessage()];
        }
    }

}