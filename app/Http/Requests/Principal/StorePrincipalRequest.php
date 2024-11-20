<?php

namespace App\Http\Requests\Principal;

use Illuminate\Foundation\Http\FormRequest;

class StorePrincipalRequest extends FormRequest
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
            'prefix' => 'required|string|max:10',
            'number' => 'required|numeric|digits:3',
            'priority_program' => 'required|exists:priority_programs,id',
            'name' => 'required|string|max:255|unique:principal_programs,name',
        ];
    }

    public function messages()
    {
        return [
            'prefix.required' => 'Prefix ID harus diisi.',
            'number.required' => 'Nomor harus diisi.',
            'priority_program.required' => 'Priority Program harus diisi.',
            'name.required' => 'Nama Program harus diisi.',
            'name.unique' => 'Nama Program sudah ada.'
        ];
    }
}
