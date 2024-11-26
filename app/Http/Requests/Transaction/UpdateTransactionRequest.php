<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
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
            'status' => [
                'string',
                'exists:transaction_programs,status'
            ],
            'activity' => [
                'required',
                'string', 
            ],
            'objective' => [
                'required',
                'string', 
            ],
            'output' => [
                'required',
                'string', 
            ],
            'target' => [
                'required',
                'string', 
            ],
            'volume' => [
                'required',
                'integer', 
            ],
            'location' => [
                'required',
                'string',
            ],
            'schedule_activity' => [
                'required',
                'date',
                'date_format:Y-m-d\TH:i'   
            ],
            'principal_program_id' => [
                'required',
                'string',
                'exists:principal_programs,id', 
            ],
            'information' => [
                'required',
                'string',
                'in:belum_terlaksana,terlaksana,tidak_terlaksana'   
            ],
            'partner' => 'required|array',
            'partner.*' => 'exists:institutional_partners,id'
        ];
    }
}
