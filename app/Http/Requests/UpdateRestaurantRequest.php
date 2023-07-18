<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
            'restaurant_name' => [
                'required', 'string', 'max:255',
                Rule::unique('restaurants')->ignore($this->restaurant)
            ],
            'description' => ['required', 'string', 'max:2048'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'vat' => [
                'required', 'regex:/^[0-9]{11}$/',
                Rule::unique('restaurants')->ignore($this->restaurant)
            ],
            'phone' => ['required', 'string', 'numeric', 'regex:/^[0-9]{0,10}$/'],
            'categories' => ['required', 'array', 'exists:categories,id'],
            'delete_check' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
