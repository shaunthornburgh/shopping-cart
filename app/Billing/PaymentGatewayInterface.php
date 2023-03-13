<?php

declare(strict_types=1);

namespace App\Billing;

use App\Models\ShippingMethod;
use App\Models\User;
use Illuminate\Support\Collection;

interface PaymentGatewayInterface
{
    public function getUser(array $attributes): User;
    public function charge(User $user, Cart $cart): string;
    public function subscribe(User $user, Cart $cart): string;
}
