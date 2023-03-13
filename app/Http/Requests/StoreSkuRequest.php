<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'sku' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|decimal:2',
            'product_id' => 'required|exists:products,id',
            'vat_id' => 'sometimes|exists:vats,id'
        ];
    }
}
