<?php

namespace App\Http\Requests\Priority;

use Illuminate\Foundation\Http\FormRequest;

class StorePriorityRequest extends FormRequest
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
            'id' => 'required|string|max:255|unique:priority_programs,id',
            'name' => 'required|string|max:255|unique:priority_programs,name',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'ID program wajib diisi.',
            'id.string' => 'ID program harus berupa teks.',
            'id.max' => 'ID program tidak boleh lebih dari 255 karakter.',
            'id.unique' => 'ID program sudah digunakan, silakan gunakan ID yang berbeda.',
            
            'name.required' => 'Nama program wajib diisi.',
            'name.string' => 'Nama program harus berupa teks.',
            'name.max' => 'Nama program tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama program sudah ada, silakan gunakan nama yang berbeda.',
        ];
    }

}
