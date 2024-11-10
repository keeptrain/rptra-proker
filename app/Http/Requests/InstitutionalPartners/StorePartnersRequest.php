<?php

namespace App\Http\Requests\InstitutionalPartners;


use Illuminate\Foundation\Http\FormRequest;

class StorePartnersRequest extends FormRequest
{
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
            'id' => 'required|string|max:55|unique:priority_programs,id',
            'name' => 'required|string|max:255|unique:priority_programs,name',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID mitra wajib diisi.',
            'id.string' => 'ID mitra harus berupa teks.',
            'id.max' => 'ID mitra tidak boleh lebih dari 55 karakter.',
            'id.unique' => 'ID mitra sudah digunakan, silakan gunakan ID yang berbeda.',
            
            'name.required' => 'Nama mitra wajib diisi.',
            'name.string' => 'Nama mitra harus berupa teks.',
            'name.max' => 'Nama mitra tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama mitra sudah ada, silakan gunakan nama yang berbeda.',
        ];
    }
}