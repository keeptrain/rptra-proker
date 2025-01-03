<?php

namespace App\Http\Requests\Profile;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'max:50',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
