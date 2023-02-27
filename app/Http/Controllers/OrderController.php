<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Package;
use App\Models\Product;
use App\Models\Sku;
use App\Models\User;
use App\Services\PaymentService;
use App\Services\ProcessPayment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    private $paymentService;
    public function __construct(PaymentService $service)
    {
        $this->paymentService = $service;
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return OrderResource
     */
    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     */
    public function store(StoreOrderRequest $request): OrderResource|JsonResponse
    {
        try {
            $order = $this->paymentService->createOrder($request);

            return new OrderResource($order);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
