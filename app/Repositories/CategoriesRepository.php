<?php

namespace App\Repositories;


use App\Models\Category;

class CategoriesRepository
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

    /**
     * @param $data
     * @return array
     */
    public function save($data)
    {
        try {
            $this->model->save($data);

            return ["type" => "success", "message" => "Categoria salva com sucesso!"];
        } catch (\Exception $e) {

            return ["type" => "error", "message" => $e->getMessage()];
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function delete($data)
    {
        try {
            $this->model->delete($data);

            return ["type" => "success", "message" => "Categoria excluída com sucesso!"];
        } catch (\Exception $e) {

            return ["type" => "error", "message" => $e->getMessage()];
        }
    }

}