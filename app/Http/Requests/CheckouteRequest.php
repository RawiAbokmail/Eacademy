<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckouteRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'country'    => 'required|string|max:100',
            'street_address1' => 'required|string|max:255',
            'street_address2' => 'nullable|string|max:255',
            'town'       => 'required|string|max:255',
            'state'      => 'nullable|string|max:255',
            'postcode'   => 'required|string|max:20',
            'phone'      => 'required|string|max:20',
            'order_note' => 'nullable|string|max:1000',
        ];
    }
}