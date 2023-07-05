<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * Retrieve all products.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getAll()
    {
        return Product::with('productBrand')->get();
    }
    /**
     * Retrieve a specific product by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getById($id)
    {
        return Product::find($id);
    }

    /**
     * Create a new product.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * Update a product.
     *
     * @param  int  $id
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function update($id, array $data)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($data);
            return $product;
        }

        return null;
    }

    /**
     * Delete a product.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
