<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getOne(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $product = $this->getOne($id);

        return $product->update($data);
    }

    public function delete(int $id)
    {
        $product = $this->getOne($id);

        return $product->delete();
    }
}
