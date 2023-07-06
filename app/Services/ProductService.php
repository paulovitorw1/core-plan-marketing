<?php

namespace App\Services;


use App\Http\Requests\ProductRulesRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Retrieve all products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        $products = $this->productRepository->getAll();
        return $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'voltage' => $product->voltage,
                'productBrand' => $product->productBrand->name
            ];
        });
    }

    /**
     * Create a new product.
     *
     * @param  \App\Http\Requests\ProductRulesRequest  $product  The request object containing the product data.
     * @return \Illuminate\Database\Eloquent\Model  The created product model.
     */
    public function create(ProductRulesRequest $product)
    {
        $mappedData = [
            'id' => Str::uuid()->toString(),
            'name' => $product->name,
            'product_brand_id' => "3f64a5f6-a63d-499e-8627-d76907e5c3a5",
            'description' => $product->description,
            'voltage' => $product->voltage,
        ];

        return $this->productRepository->create($mappedData);
    }

    /**
     * Get a product by its ID.
     *
     * @param  String  $id  The ID of the product.
     * @return \Illuminate\Database\Eloquent\Model|null  The product model, or null if not found.
     */
    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * Create a new product.
     *
     * @param  \App\Http\Requests\ProductRulesRequest  $product  The request object containing the product data.
     * @return \Illuminate\Database\Eloquent\Model  The created product model.
     */
    public function update(ProductRulesRequest $product, $id)
    {
        $mappedData = [
            'id' => $id,
            'name' => $product->name,
            'product_brand_id' => $product->productBrand,
            'description' => $product->description,
            'voltage' => $product->voltage,
        ];

        return $this->productRepository->update($id, $mappedData);
    }

    /**
     * Delete a product by its ID.
     *
     * @param  String  $id  The ID of the product.
     * @return \Illuminate\Database\Eloquent\Model|null  The product model, or null if not found.
     */
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
