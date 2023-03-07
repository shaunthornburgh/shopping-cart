<?php

declare(strict_types=1);

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function getOrderById($orderId);
    public function createOrder(array $orderDetails);
}
