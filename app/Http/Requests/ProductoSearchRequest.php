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
        return true; //Autorizo a que el usuario realice la solicitud 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:100', // Término de búsqueda opcional, máximo 100 caracteres
            'per_page' => 'nullable|integer|in:10,25,50',
            'sort_by' => 'nullable|string|in:id,name,price,created_at,', // Campos permitidos para ordenar
            'sort_order' => 'nullable|string|in:asc,desc', // Ordenamiento ascendente o descendente
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'search' => $this->input('search'),
            'per_page' => $this->input('per_page', 10), // Por defecto 10 items por página
            'sort_by' => $this->input('sort_by', 'id',), // Por defecto ornena por id
            'sort_order' => $this->input('sort_order', 'desc'), // Por defecto orden descendente
        ];
    }
}
