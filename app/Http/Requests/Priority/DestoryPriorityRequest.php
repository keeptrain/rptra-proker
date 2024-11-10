<?php

namespace App\Http\Requests\Priority;

use App\Models\Principal_program;
use Illuminate\Foundation\Http\FormRequest;

class DestoryPriorityRequest extends FormRequest
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
            'priority_ids' => 'required|array',
            'priority_ids.*' => 'exists:priority_programs,id',
        ];
    }

    /**
     * Configure the validator instance.
     */
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $priorityIds = $this->input('priority_ids');

            // Cek apakah ada ID dalam priority_ids yang sedang digunakan di Main_program
            $inUseCount = Principal_program::whereIn('priority_program_id', $priorityIds)->count();

            if ($inUseCount > 0) {
                $validator->errors()->add('priority_ids', 'Beberapa program tidak bisa dihapus karena sedang digunakan dalam Program Pokok.');
            }
        });
    }
}
