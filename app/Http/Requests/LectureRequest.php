<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
            'name' => 'required',
            'time' => 'required',
            'video' => 'nullable|file|mimes:mp4,avi,mov|max:51200',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
