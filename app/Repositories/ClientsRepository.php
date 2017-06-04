<?php

namespace App\Repositories;

use App\Models\Client;

class ClientsRepository
{
    /**
     * @var Client
     */
    protected $model;

    /**
     * CategoriesRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new Client;
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
            $this->model->save($this->format($data));

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
            "cpf" => (string) $data["cpf"],
            "address" => (string) $data["address"],
            "email" => (string) $data["email"],
            "birth_date" => \DateTime::createFromFormat("Y-m-d", $data["birth_date"])->format("Y-m-d"),
            "created_at" => date("Y-m-d H:i:s"),
            "country" => (string) $data["country"],
            "city" => (string) $data["city"],
        ];
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

}