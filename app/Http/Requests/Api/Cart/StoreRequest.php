<?php

namespace App\Http\Requests\Api\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'firstname' => ['required', 'string'],
            // 'lastname' => ['required', 'string'],
            'address' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'payable' => ['required', 'numeric']
        ];
    }
}
