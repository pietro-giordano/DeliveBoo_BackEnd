<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name' => 'max:128|required',
            'customer_surname' => 'max:128|required',
            'customer_address' => 'max:255|required',
            'customer_email' => 'max:255|required',
            'phone_number' => 'max:10',
            'total_price' => 'decimal:2',
            'cart' => 'array|required|min:1',
            'cart.*.id' => 'required|integer|exists:dishes,id',
            'cart.*.qty' => 'required|integer|min:1'
        ];
    }
}
