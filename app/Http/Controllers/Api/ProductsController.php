<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\LogProduct;
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
            $jsonResponse = new JsonResponse([
                'error' => false,
                'message' => null,
                'status' => 200,
                'data' => $products
            ], 200);

            $this->registerLog([
                'action' => 'index',
                'content' => $jsonResponse->content(),
            ]);

            return $jsonResponse;
        } catch (\Exception $e) {
            $jsonResponse = new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível realizar o cadastro',
                'status' => 202,
                'data' => []
            ], 202);

            $this->registerLog([
                'action' => 'index',
                'content' => $jsonResponse->content(),
                'exception' => $e->getMessage()
            ]);

            return $jsonResponse;
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
            $jsonResponse = new JsonResponse([
                'error' => false,
                'message' => 'Registro cadastrado com sucesso',
                'status' => 201,
                'data' => $product
            ], 201);

            $this->registerLog([
                'action' => 'store',
                'content' => $jsonResponse->content(),
            ]);

            return $jsonResponse;

        } catch (\Exception $e) {
            $jsonResponse = new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível realizar o cadastro',
                'status' => 400,
                'data' => []
            ], 400);

            $this->registerLog([
                'action' => 'store',
                'content' => $jsonResponse->content(),
                'exception' => $e->getMessage()
            ]);

            return $jsonResponse;
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
            $jsonResponse = new JsonResponse([
                'error' => false,
                'message' => null,
                'status' => 200,
                'data' => $product
            ], 200);

            $this->registerLog([
                'action' => 'show',
                'content' => $jsonResponse->content(),
            ]);

            return $jsonResponse;

        } catch (\Exception $e) {
            $jsonResponse = new JsonResponse([
                'error' => true,
                'message' => 'Nenhum registro encontrado',
                'status' => 404,
                'data' => []
            ], 404);

            $this->registerLog([
                'action' => 'show',
                'content' => $jsonResponse->content(),
                'exception' => $e->getMessage()
            ]);

            return $jsonResponse;
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
            $jsonResponse = new JsonResponse([
                'error' => false,
                'message' => 'Registro atuallizado com sucesso',
                'status' => 202,
                'data' => $product
            ], 200);

            $this->registerLog([
                'action' => 'update',
                'content' => $jsonResponse->content(),
            ]);

            return $jsonResponse;

        } catch (\Exception $e) {
            $jsonResponse = new JsonResponse([
                'error' => true,
                'message' => 'Não foi possível atualizar o registro',
                'status' => 400,
                'data' => []
            ], 400);

            $this->registerLog([
                'action' => 'update',
                'content' => $jsonResponse->content(),
                'exception' => $e->getMessage()
            ]);

            return $jsonResponse;
        }
    }


    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $this->productService->delete($id);
            $jsonResponse = new JsonResponse([
                'status' => 202,
                'error' => false,
                'message' => 'Registro removido com sucesso',
                'data' => []
            ], 202);

            $this->registerLog([
                'action' => 'destroy',
                'content' => $jsonResponse->content(),
            ]);

            return $jsonResponse;

        } catch (\Exception $e) {
            $jsonResponse = new JsonResponse([
                'error' => true,
                'message' => 'Nenhum registro encontrado',
                'status' => 404,
                'data' => []
            ], 404);

            $this->registerLog([
                'action' => 'destroy',
                'content' => $jsonResponse->content(),
                'exception' => $e->getMessage()
            ]);

            return $jsonResponse;

        }
    }

    protected function registerLog(array $data)
    {
        LogProduct::create($data);
    }
}
