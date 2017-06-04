<?php

namespace App\Repositories;

use App\Models\Sale;

class SalesRepository
{
    /**
     * @var Sale
     */
    protected $model;

    public function __construct()
    {
        $this->model = new Sale;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->model->select(['*'])->get();
    }

    public function create($data)
    {
        return $this->model->save($data);
    }

    public function update($id, $data)
    {
        return $this->model->update($id, $data);
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