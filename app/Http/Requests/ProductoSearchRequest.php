<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoSearchRequest extends FormRequest
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
            'search' => 'nullable|string|max:100',
            'per_page' => 'nullable|integer|in:10,25,50',
            'sort_by' => 'nullable|string|in:name,price,created_at,description',
            'sort_order' => 'nullable|string|in:asc,desc',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'search' => $this->input('search'),
            'per_page' => $this->input('per_page', 10),
            'sort_by' => $this->input('sort_by', 'created_at'),
            'sort_order' => $this->input('sort_order', 'desc'),
        ];
    }
}
