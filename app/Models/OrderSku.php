<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderSku extends Pivot
{
    use HasFactory;

    protected $table = 'order_sku';

    protected $fillable = [
        'sku_id',
        'order_id',
        'payment_id',
        'status',
        'quantity',
        'vat_amount'
    ];

    public function sku(): BelongsTo
    {
        return $this->belongsTo(Sku::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
