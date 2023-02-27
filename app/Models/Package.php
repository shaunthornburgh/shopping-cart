<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'vat_id'
    ];

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class)
            ->using(PackageSku::class)
            ->withPivot('quantity');
    }
    public function vat(): BelongsTo
    {
        return $this->belongsTo(Vat::class);
    }
}
