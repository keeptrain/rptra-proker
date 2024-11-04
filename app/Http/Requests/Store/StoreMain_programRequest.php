<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreMain_programRequest extends FormRequest
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
            'priority_program' => 'required|exists:priority_programs,id', // Pastikan id program prioritas valid
            'name' => 'required|string|max:255',
        ];
    }
}
