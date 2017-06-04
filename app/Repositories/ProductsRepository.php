<?php

namespace App\Repositories;


use App\Models\Product;

class ProductsRepository
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * @var CategoriesRepository
     */
    protected $categoriesRepository;

    /**
     * ProductsRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new Product;
        $this->categoriesRepository = new CategoriesRepository;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->model->select(['*'])->get();
    }

    public function list()
    {
        return $this->model->select(["id, CONCAT(name, ' - R$', price) AS name"])->get();
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
     * @return object
     */
    public function save($data)
    {
        try {
            $this->model->save(
                $this->format($data)
            );

            return (object) ["type" => "success", "message" => "Produto salvo com sucesso!"];
        } catch (\Exception $e) {

            return (object) ["type" => "error", "message" => $e->getMessage()];
        }
    }

    public function update($id, $data)
    {
        try {
            $this->model->update($id, $this->format($data));

            return (object) ["type" => "success", "message" => "Alterações salvas com sucesso!"];
        } catch (\Exception $e) {

            return (object)["type" => "error", "message" => $e->getMessage()];
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
            "price" => floatval($data["price"]),
            "weight" => (int) $data["weight"],
            "quantity" => (int) $data["quantity"],
            "category_id" => (int) $data["category_id"],
            "description" => trim((string) $data["description"]),
        ];
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        try {
            return $this->model->find($id)
                ?? (object) ["type" => "error", "message" => "Produto não encotrado!"];

        } catch (\Exception $e) {
            return (object) ["type" => "error", "message" => $e->getMessage()];
        }
    }

}