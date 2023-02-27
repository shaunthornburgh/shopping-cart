<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public const ATTRIBUTES = [
        'Size', 'Colour'
    ];

    public const SIZE = 'Size';
    public const SIZES = [
            'Small', 'Medium', 'Large'
        ];
    public const COLOUR = 'Colour';
    public const COLOURS = [
        'Red', 'Green', 'Blue'
    ];

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class)->withPivot('value');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSize($query)
    {
        $query->where('name', self::SIZE);
    }

    public function scopeColour($query)
    {
        $query->where('name', self::COLOUR);
    }
}
