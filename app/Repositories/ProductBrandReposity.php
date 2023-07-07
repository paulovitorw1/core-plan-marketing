<?php

namespace App\Repositories;

use App\Models\ProductBrand;

class ProductBrandReposity
{
    /**
     * Retrieve all products.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getAll()
    {
        return ProductBrand::all();
    }
}