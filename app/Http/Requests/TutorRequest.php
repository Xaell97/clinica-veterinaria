<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
=======
use Illuminate\Validation\Rule;
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae

class TutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
<<<<<<< HEAD
        // Apenas logados podem enviar esse formulário.
=======
        // Apenas logados podem enviar esse formulário
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
<<<<<<< HEAD
        $tutorId = $this->route('tutor');

        return [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:tutors,cpf,' . $tutorId],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],

        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'O nome do Tutor é obrigatório.',
            'cpf.requirted'   => 'O CPF é obrigatório.',
            'cpf.unique'      => 'Este CPF já está cadastrado no sistema.',
            'phone.required'  => 'O telefone de contato é obrigatório.',
=======
        $tutor = $this->route('tutor');

        $tutorId = $tutor ? $tutor->id : null;

        return [
            'name'      => ['required', 'string', 'max:255'],
            'cpf'       => [
                'required', 
                'string', 
                'max:14', 
                Rule::unique('tutors', 'cpf')->ignore($tutorId)
                ],
            'phone'     => ['required', 'string', 'max:20'],
            'address'   => ['nullable', 'string', 'max:255'],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'     => 'O nome do Tutor é obrigatório.',
            'cpf.required'      => 'O CPF é obrigatório.',
            'cpf.unique'        => 'Este CPF já está cadastrado no sistema.',
            'phone.required'    => 'O telefone de contato é obrigatório.',
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae
        ];
    }
}
