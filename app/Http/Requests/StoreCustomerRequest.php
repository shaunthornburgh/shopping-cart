<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required',
            'address_line_1' => 'required|string',
            'address_line_2' => 'sometimes|required|string',
            'town' => 'required|string',
            'county' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required|string'
        ];
    }
}
