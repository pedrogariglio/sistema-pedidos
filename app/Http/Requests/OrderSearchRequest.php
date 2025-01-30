<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //Autorizo al usuario a que realice la solicitud 
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
            'sort_by' => 'nullable|string|in:id,total_price',
            'sort_order' => 'nullable|string|in:asc,desc',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'search' => $this->input('search'),
            'per_page' => $this->input('per_page', 10),
            'sort_by' => $this->input('sort_by', 'id'), // Por defecto ordena por ID
            'sort_order' => $this->input('sort_order', 'desc'), // Por defecto orden descendente 
        ];
    }
}
