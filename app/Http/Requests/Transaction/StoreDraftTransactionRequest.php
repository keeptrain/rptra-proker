<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreDraftTransactionRequest extends FormRequest
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
            'status' => 'string|exists:transaction_programs,status',
            'activity' => 'nullable|nullable|string',
            'objective' => 'nullable|string',
            'output' => 'nullable|string',
            'target' => 'nullable|string',
            'volume' => 'nullable|int', 
            'location' => 'nullable|string',
            'schedule_activity' => 'nullable|date|date_format:Y-m-d\TH:i',
            'principal_program_id' => 'nullable|exists:main_programs,id',
            'information' => 'string|in:belum_terlaksana,terlaksana,tidak_terlaksana',
            'partner' => 'nullable|array',
            'partner.*' => 'exists:institutional_partners,id'
        ];
    }

    public function messages()
    {
        return [
            'partner.exists' => 'Mitra tidak ada'
        ];
    }
 
}
