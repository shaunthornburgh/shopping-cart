<?php

declare(strict_types=1);

namespace App\Billing;

interface PaymentGatewayInterface
{
    public function getUser(array $attributes);
    public function charge($user, $paymentMethodId, $amount);
    public function subscribe($user, $sku, $quantity, $paymentMethodId);
}
