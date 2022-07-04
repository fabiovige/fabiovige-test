<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestProduct;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $products = $this->productService->getAll();

        return ProductResource::collection($products);
    }

    public function store(RequestProduct $request): ProductResource
    {
        $product = $this->productService->create($request->validated());

        return new ProductResource($product);
    }

    public function show($id): ProductResource
    {
        $product = $this->productService->getOne($id);

        return new ProductResource($product);
    }

    public function update(RequestProduct $request, $id): JsonResponse
    {
        $this->productService->update($id, $request->validated());

        return response()->json([
            'updated' => true
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $this->productService->delete($id);

        return response()->json([], 204);
    }
}
