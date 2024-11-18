<?php

namespace App\Http\Requests\Transaction;


use Illuminate\Foundation\Http\FormRequest;

class DestoryTransactionRequest extends FormRequest
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
            'transaction_ids' => 'required|array',
            'transaction_ids.*' => 'exists:transaction_programs,id',
        ];
    }

    /**
     * Configure the validator instance.
     */
}
