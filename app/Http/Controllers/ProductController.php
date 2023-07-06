<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Requests\ProductRulesRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @param ProductService $productService
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductService $productService)
    {
        try {
            $products = $productService->getAll();
            return Response::json($products, __('Product successfully listed'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request  The HTTP request object containing the product data.
     * @param  \App\Services\ProductService  $service  The service responsible for creating the product.
     * @return \Illuminate\Http\Response  The JSON response with the created product data.
     */
    public function store(ProductRulesRequest $request, ProductService $service)
    {
        try {
            $product = $service->create($request);
            return Response::json($product, __('Products successfully created'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param   $request  The HTTP request object containing the product data.
     * @param  \App\Services\ProductService  $service  The service responsible for get the product.
     * @return \Illuminate\Http\Response  The JSON response with the created product data.
     */
    public function edit($id, ProductService $service)
    {
        try {
            $product = $service->getById($id);
            return Response::json($product, __('Products successfully listed'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRulesRequest  $request  The request object containing the product data.
     * @param  \App\Services\ProductService  $service  The service responsible for update the product.
     * @param  int  $id  The ID of the product to be updated.
     * @return \Illuminate\Http\Response  The JSON response with the updated product data.
     */
    public function update(ProductRulesRequest $request, ProductService $service, $id)
    {
        try {
            $product = $service->update($request, $id);
            return Response::json($product, __('Products successfully updated'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id  The ID of the product to be updated.
     * @param  \App\Services\ProductService  $service  The service responsible for delete the product.
     * @return \Illuminate\Http\Response  The JSON response with the created product data.
     */
    public function destroy($id, ProductService $service)
    {
        try {
            $product = $service->delete($id);
            return Response::json($product, __('Products successfully deleted'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }
}
