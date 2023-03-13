<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'vat_id',
        'default'
    ];

    const STANDARD = 1;
    const EXPRESS = 2;


    public function vat(): BelongsTo
    {
        return $this->belongsTo(Vat::class);
    }

    public function getVatAmount(): float
    {
        return $this->vat ? round(($this->price * $this->vat->rate / 100), 2) : 0;
    }
}
