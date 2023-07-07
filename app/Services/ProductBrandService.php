<?php

namespace App\Services;


use App\Repositories\ProductBrandReposity;

class ProductBrandService
{
    protected $productBrandRepository;

    public function __construct(ProductBrandReposity $productBrandRepository)
    {
        $this->productBrandRepository = $productBrandRepository;
    }

    /**
     * Retrieve all products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        return $this->productBrandRepository->getAll();
    }
}