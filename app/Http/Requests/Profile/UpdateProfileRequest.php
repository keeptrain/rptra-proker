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
            'image' => ['nullable','image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'crop_x' => 'nullable',
            'crop_y' => 'nullable',
            'crop_width' => 'nullable',
            'crop_height' => 'nullable',
            'name' => ['required','string','max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'max:50',
                'regex:/^\S*$/',
                Rule::unique(User::class)->ignore($this->user()->id),
            ]
        ];
    }

    public function messages(){
        return [
            'image.mimes' => 'Format gambar ini tidak di dukung',

            'name.required' => 'Nama pengguna tidak boleh kosong.',
            
            'email.required' => 'Username tidak boleh kosong.',
            'email.lowercase' => 'Username harus huruf kecil.',
            'email.regex' => 'Username tidak boleh terdapat spasi',
        ];
    }
}
