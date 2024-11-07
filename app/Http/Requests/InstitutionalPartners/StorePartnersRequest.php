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
            'prefix' => 'required|string|max:10',
            'number' => 'required|numeric|digits:3',
            'name' => 'required|string|max:255',
        ];
    }
}