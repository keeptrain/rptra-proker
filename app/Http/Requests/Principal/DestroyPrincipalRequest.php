<?php

namespace App\Http\Requests\Principal;

use App\Models\Main_program;
use Illuminate\Foundation\Http\FormRequest;

class DestroyPrincipalRequest extends FormRequest
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
            'principal_ids' => 'required|array',
            'principal_ids.*' => 'exists:principal_programs,id',
        ];
    }
}
