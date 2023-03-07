<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'product_id' => $this->product_id,
            'description' => $this->description,
            'attributes' => $this->attributes,
            'value' => $this->whenPivotLoaded('attribute_sku', function () {
                return $this->pivot->value;
            }),
            'packages' => $this->packages,
            'vat' => $this->vat,
            'quantity' => $this->whenPivotLoaded('package_sku', function () {
                return $this->pivot->quantity;
            }),
        ];
    }
}
