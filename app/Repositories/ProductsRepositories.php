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

}