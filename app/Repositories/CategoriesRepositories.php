<?php

namespace App\Repositories;


use App\Models\Category;

class CategoriesRepositories
{
    protected $model;

    public function __construct()
    {
        $this->model = new Category;
    }

    public function all()
    {
        return $this->model->select(['*'])->get();
    }

    public function save($data)
    {
        try {
            $this->model->save($data);

            return ["success" => "Categoria salva com sucesso!"];
        } catch (\Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

}