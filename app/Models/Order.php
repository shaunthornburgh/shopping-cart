<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class)
            ->using(OrderSku::class)
            ->withPivot('quantity');
    }

    public function addSku($paymentId, $order, $sku, $quantity, $vatAmount, $status)
    {
        $order->skus()->attach($sku, [
            'payment_id' => $paymentId,
            'order_id' => $order->id,
            'quantity' => $quantity,
            'vat_amount' => $vatAmount,
            'status' => $status
        ]);
    }
}
