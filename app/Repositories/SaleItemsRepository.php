<?php

namespace App\Repositories;


use App\Models\SaleItems;

class SaleItemsRepository
{
    /**
     * @var SaleItems
     */
    protected $model;

    /**
     * CategoriesRepositories constructor.
     */
    public function __construct()
    {
        $this->model = new SaleItems;
    }

    /**
     * @param $data
     * @return array
     */
    public function save($data)
    {
        return $this->model->save($data);
    }

    public function delete($item_id)
    {
        return $this->model->delete($item_id);
    }



}