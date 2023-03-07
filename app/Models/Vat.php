<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'stripe_tax_rate_id'
    ];

    public const RATE_20 = 1;

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
