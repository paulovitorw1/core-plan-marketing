<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
     * Retrieve all products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function create(Request $request)
    {
        $this->productValidation($request);
        
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
     * Retrieve all products.
     *
     * @return \Illuminate\Support\Collection
     */
    private function productValidation($data)
    {
        return $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
        ]);
    }
}
