<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $servicoId = $this->route(servico);
        return [
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:255'],
            'price'         => ['required', 'numeric', 'max:8,2'], 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'O nome do serviço é obrigatório.',
            'price.requirted'   => 'O preço do serviço é obrigatório.',
        ];
    }
}
