<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'slug' => $this->slug,
            'skus' => $this->skus,
            'vat' => $this->vat,
//            'quantity' => $this->whenPivotLoaded('package_sku', function () {
//                return $this->pivot->quantity;
//            }),
        ];
    }
}
