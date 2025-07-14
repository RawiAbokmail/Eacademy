<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
        'name' => 'required|string|max:150',
        'email' => 'required|email|unique:users,email,' . ($this->user->id ?? 'NULL'),
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'role' => 'required|in:admin,teacher,student',
        'job' => 'required_if:role,teacher|string|max:150',
        'description' => 'required_if:role,teacher|string|max:500',
        'bio' => 'required_if:role,teacher|string|max:500',
    ];

         if ($this->isMethod('post')) {
        $rules['password'] = 'required|string|min:6';
    } else if ($this->isMethod('put')) {
        $rules['password'] = 'nullable|string|min:6';
    }

        return $rules;
    }
}
