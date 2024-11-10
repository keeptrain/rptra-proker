<?php

namespace App\Http\Requests\InstitutionalPartners;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnersRequest extends FormRequest
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
            'id' => [
                'required',
                'string',
                'max:55',
                //Rule::unique('institutional_partners', 'id')->ignore($this->route('id')),
                'unique:institutional_partners,id,' . $this->ignoreIdFromRoute(),
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('institutional_partners', 'name')->ignore($this->route('id')),
                'unique:institutional_partners,name,' . $this->ignoreIdFromRoute(),

            ],
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

    public function ignoreIdFromRoute()
    {
        return $this->route('id') . ',id';
    }
}
