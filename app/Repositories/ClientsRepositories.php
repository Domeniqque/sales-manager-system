<?php

namespace App\Repositories;


use App\Models\Category;

class ClientsRepositories
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * CategoriesRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new Category;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->model->select(['*'])->get();
    }

    public function save($data)
    {
        try {
            $this->model->save(
                $this->format($data)
            );

            return ["type" => "success", "message" => "Cliente salvo com sucesso!"];
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
            "cpf" => (float) $data["price"],
            "endereço" => (int) $data["weight"],
            "email" => (int) $data["quantity"],
            "birth_date" => (int) $data["category_id"],
            "created_at" => date("Y-m-d H:i:s"),
            "description" => trim((string) $data["description"]),
        ];
    }

}