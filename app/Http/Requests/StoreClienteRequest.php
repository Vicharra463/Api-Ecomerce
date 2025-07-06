<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255',
            'Razon_Social' => 'required|string|max:255',
            'RUC' => 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
        ];
    }
}
