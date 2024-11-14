<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'activity' => 'required|string',
            'objective' => 'required|string',
            'output' => 'required|string',
            'target' => 'required|string',
            'volume' => 'required|int', 
            'location' => 'required|string',
            'schedule_activity' => 'required|date|date_format:Y-m-d\TH:i',
            'principal_program_id' => 'required|exists:main_programs,id',
            'information' => 'string|exists:transaction_programs,information',
            'partner' => 'required|array',
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
