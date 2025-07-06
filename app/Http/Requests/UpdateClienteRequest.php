<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
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
        $id = $this->route('CODI_CLI'); // esto jala el valor de la ruta

        return [
            'Nombre' => 'sometimes|string|max:255',
            'Direccion' => 'sometimes|string|max:255',
            'Email' => [
                'sometimes',
                'string',
                'email',
                'max:255',
                Rule::unique('clientes', 'Email')->ignore($id, 'CODI_CLI'),
            ],
            'Razon_Social' => 'sometimes|string|max:255',
            'RUC' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('clientes', 'RUC')->ignore($id, 'CODI_CLI'),
            ],
            'Telefono' => 'sometimes|string|max:255',
        ];
    }
}
