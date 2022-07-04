<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $products = $this->productService->getAll();
            return new JsonResponse([
                'error' => false,
                'message' => null,
                'status' => 200,
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível realizar o cadastro',
                'status' => 202,
                'data' => []
            ], 202);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $product = $this->productService->create($request->all());
            return new JsonResponse([
                'error' => false,
                'message' => 'Registro cadastrado com sucesso',
                'status' => 201,
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível realizar o cadastro',
                'status' => 400,
                'data' => []
            ], 400);
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show( int $id)
    {
        try {
            $product = $this->productService->getOne($id);
            return new JsonResponse([
                'error' => false,
                'message' => null,
                'status' => 200,
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => 'Nenhum registro encontrado',
                'status' => 404,
                'data' => []
            ], 404);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $this->productService->update($id, $request->all());
            $product = $this->productService->getOne($id);
            return new JsonResponse([
                'error' => false,
                'message' => 'Registro atuallizado com sucesso',
                'status' => 202,
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível atualizar o registro',
                'status' => 400,
                'data' => []
            ], 400);
        }
    }


    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $product = $this->productService->delete($id);
            return new JsonResponse([
                'status' => 202,
                'error' => false,
                'message' => 'Registro removido com sucesso',
                'data' => []
            ], 202);
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => 'Nenhum registro encontrado',
                'status' => 404,
                'data' => []
            ], 404);
        }
    }
}
