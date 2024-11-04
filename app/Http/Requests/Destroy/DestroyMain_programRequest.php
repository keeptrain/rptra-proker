<?php

namespace App\Http\Requests\Destroy;

use App\Models\Main_program;
use Illuminate\Foundation\Http\FormRequest;

class DestroyMain_programRequest extends FormRequest
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
            'main_ids' => 'required|array',
            'main_ids.*' => 'exists:main_programs,id',
        ];
    }

     /**
     * Configure the validator instance.
     */
   
}
