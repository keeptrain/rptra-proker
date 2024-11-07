<?php

namespace App\Http\Requests\InstitutionalPartners;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class DestroyPartnersRequest extends FormRequest
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
            'partner_ids' => 'required|array',
            'partner_ids.*' => 'exists:institutional_partners,id',
        ];
    }
}