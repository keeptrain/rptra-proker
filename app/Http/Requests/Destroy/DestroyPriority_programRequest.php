<?php

namespace App\Http\Requests\Destroy;

use App\Models\Main_program;
use Illuminate\Foundation\Http\FormRequest;

class DestroyPriority_programRequest extends FormRequest
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
            // Loop through each priority_id to check if it's used in Main_program
            foreach ($this->priority_ids as $priorityProgramId) {
                if (Main_program::where('priority_program_id', $priorityProgramId)->exists()) {
                    $validator->errors()->add('priority_ids', "Program dengan ID {$priorityProgramId} tidak bisa dihapus karena sedang digunakan dalam Program Pokok.");
                }
            }
        });
    }
}
