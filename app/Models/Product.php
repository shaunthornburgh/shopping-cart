<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public const T_SHIRT = 1;
    public const JUMPER = 2;
    public const TROUSERS = 3;
    public const T_SHIRTS_MONTHLY_SUBSCRIPTION = 4;
    public const JUMPERS_MONTHLY_SUBSCRIPTION = 5;
    public const TROUSERS_MONTHLY_SUBSCRIPTION = 6;
    public const ONBOARDING_FEE = 7;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'stripe_product_id'
    ];

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
