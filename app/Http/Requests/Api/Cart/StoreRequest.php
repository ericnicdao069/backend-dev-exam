<?php

namespace App\Http\Requests\Api\Cart;

use App\Enums\PaymentMethod;
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
            'address' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'payable' => ['required', 'numeric']
        ];
    }

    public function data(): array
    {
        return array_merge($this->except([
            '_token',
            'payable'
        ]), [
            'admin_id' => auth()->user()->id,
            'total_amount' => $this->payable,
            'payment_method' => PaymentMethod::GCASH->value
        ]);
    }
}
