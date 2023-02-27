<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'address' => 'required',
            'cart' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
            'paymentMethod' => 'required',
            'payment_method_id' => 'required',
            'total_amount' => 'required',
            'zipcode' => 'required',
        ];
    }
}
