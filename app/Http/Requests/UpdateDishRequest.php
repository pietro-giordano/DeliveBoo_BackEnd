<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\validation\Rule;

class UpdateDishRequest extends FormRequest
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
        $restaurant_id = auth()->user()->restaurant->id;
        $dish_id = $this->route('dish');

        return [
            'name' => [
                'required',
                Rule::unique('dishes')->ignore($dish_id)->where(function ($query) use ($restaurant_id) {
                    return $query->where('restaurant_id', $restaurant_id);
                }),
                'max:128'
            ],
            'description' => 'max:2048',
            'price' => 'decimal:2',
            'image' => 'nullable|image|max:2048',
            'delete_check' => 'nullable',
            'available' => 'boolean'
        ];
    }
}
