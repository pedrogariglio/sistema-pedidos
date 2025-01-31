<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:products,name,' . $this->route('product'),
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name required.',
            'namw.unique' => 'There is already a product wiht that name',
            'name.max' => 'The name of the product cannot exceed 255 characters',

            'price.required' => 'Product price required.',
            'price.numeric' => 'Price must be positive number.',
            'price.min' => 'Price must be positive number',

            'stock.required' => 'Stock quantity is required',
            'stock.integer' => 'Stock must be a whole number.',
            'stock.min' => 'Stock must be positive number',
        ];
    }

}
