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
                'productBrand' => $product->productBrand->name,
                'imageProduct' => 'image_product/' . $product->url_image_product
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
            'product_brand_id' => $product->productBrand,
            'description' => $product->description,
            'voltage' => $product->voltage,
            'url_image_product' => $this->setImage($product->imageProduct)
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
        $productById = $this->productRepository->getById($id);
        return [
            'id' => $productById->id,
            'name' => $productById->name,
            'description' => $productById->description,
            'voltage' => $productById->voltage,
            'productBrand' => [
                'id' => $productById->productBrand->id,
                'name' => $productById->productBrand->name
            ],
            'imageProductURL' => 'image_product/' . $productById->url_image_product
        ];
    }

    /**
     * Create a new product.
     *
     * @param  \App\Http\Requests\ProductRulesRequest  $product  The request object containing the product data.
     * @return \Illuminate\Database\Eloquent\Model  The created product model.
     */
    public function update(ProductRulesRequest $product, $id)
    {
        $existingProduct = $this->productRepository->getUrlImageById($id);
        $filenameRequest = substr($product->imageProductURL, strrpos($product->imageProductURL, '/') + 1);
        $mappedData = [
            'id' => $id,
            'name' => $product->name,
            'product_brand_id' => $product->productBrand,
            'description' => $product->description,
            'voltage' => $product->voltage,
        ];
        if ($filenameRequest == $existingProduct) {
            unset($mappedData['url_image_product']);
        }else {
            $mappedData['url_image_product'] = $this->setImage($product->imageProduct);
        }
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

    /**

     *Set the image file for the product.

     *@param mixed $productImage The uploaded image file or request object containing the image file.

     *@return string The uploaded image file path or the default image file path if no file is provided.
     */
    public function setImage($productImage)
    {
        $uploadNameFile = "imageDefault.png";
        if ($productImage->isValid('imageProduct')) {
            $nameFile = Str::uuid()->toString() . '.' . $productImage->getClientOriginalExtension();
            $destinationPath = public_path('/image_product');
            $productImage->move($destinationPath, $nameFile);
            $uploadNameFile = $nameFile;
        }
        return $uploadNameFile;
    }
}
