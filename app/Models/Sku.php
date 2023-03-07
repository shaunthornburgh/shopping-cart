<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'product_id',
        'name',
        'vat_id'
    ];

    protected $hidden = [
        'product',
        'stripe_price_id'
    ];

    protected $with = ['packages', 'vat'];

    protected $appends = ['is_package', 'is_subscription'];


    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class)->using(PackageSku::class)->withPivot('quantity');
    }

    public function getIsPackageAttribute(): bool
    {
        return !! $this->packages->count();
    }
    public function getIsSubscriptionAttribute(): bool
    {
        return $this->product->category->id === Category::SUBSCRIPTIONS;
    }

    public function getVatAmount(int $quantity): float
    {
        return $this->vat ? round(($this->price * $quantity * $this->vat->rate / 100), 2) : 0;
    }

    public function vat(): BelongsTo
    {
        return $this->belongsTo(Vat::class);
    }
}
