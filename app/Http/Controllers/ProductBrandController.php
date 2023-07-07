<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Services\ProductBrandService;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductBrandService $service)
    {
        try {
            $productsBrand = $service->getAll();
            return Response::json($productsBrand, __('Product brands successfully listed'), 200);
        } catch (\Exception $e) {
            return Response::exception($e);
        }
    }
}
