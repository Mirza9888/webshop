<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name'=>['nullable'],
            'user_id' => ['nullable'],
            'email'=> ['string','email'],
            'cart_id'=>['nullable'],
            'total_price'=> ['nullable'],
            'discounted_price' => ['nullable'],
            'return_reason' => ['nullable'],
            'shipment_status'=>['nullable'],
            'address' => ['nullable'],
            'city'=> ['nullable'],
            'postal_code'=> ['nullable'],
            'country'=> ['nullable'],
            'payment_method'=> ['nullable'],
            'payment_status'=> ['nullable'],
            'ordered_at' => ['nullable']
        ];
    }
}
