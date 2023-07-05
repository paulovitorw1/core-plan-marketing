<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Models\Product;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProductService $productService)
    {
        try {
            $products = $productService->getAll();
            return Response::json($products, __('Successfully tested products'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
