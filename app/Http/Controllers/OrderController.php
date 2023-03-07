<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    /**
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     */
    public function show(Order $order): OrderResource
    {
        return new OrderResource($this->orderRepository->getOrderById($order->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderRequest $request
     */
    public function store(StoreOrderRequest $request): OrderResource|JsonResponse
    {
        // TODO return to $request->validated()
        return new OrderResource($this->orderRepository->createOrder($request->toArray()));
    }
}
