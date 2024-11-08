<?php

namespace App\Http\Requests\Principal;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePrincipalRequest extends FormRequest
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
            'id' => [
                'required',
                'string',
                'max:55',
                Rule::unique('main_programs', 'id')->ignore($this->route('id'))
            ],
            'priority_program' => [
                'required',
                'string',
                'exists:priority_programs,id'
               
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('main_programs', 'name')->ignore($this->route('id'))
            ],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID program wajib diisi.',
            'id.string' => 'ID program harus berupa teks.',
            'id.max' => 'ID program tidak boleh lebih dari 255 karakter.',
            'id.unique' => 'ID program sudah digunakan, silakan gunakan ID yang berbeda.',

            'priority_program.required' => 'Program prioritas wajib dipilih',
            'priority_program.string' => 'Program prioritas harus berupa teks.',
            'priority_program.exists' => 'Program prioritas yang dipilih tidak valid.',
            
            'name.required' => 'Nama program wajib diisi.',
            'name.string' => 'Nama program harus berupa teks.',
            'name.max' => 'Nama program tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama program sudah ada, silakan gunakan nama yang berbeda.',
        ];
    }
    
}
