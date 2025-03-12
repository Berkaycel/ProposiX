<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'offer_amount_number' => 'required|numeric|min:0',
            'offer_amount_text' => 'required|string|max:255',
            'expiration_date' => 'required|date|after_or_equal:today',
            'offer_description' => 'nullable|string|max:500',
            'quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Get the custom validation messages for the validator.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'offer_amount_number.required' => 'Teklif ücreti rakam ile belirtilmelidir.',
            'offer_amount_number.numeric' => 'Teklif ücreti sadece rakam olmalıdır.',
            'offer_amount_number.min' => 'Teklif ücreti sıfırdan büyük olmalıdır.',
            'offer_amount_text.required' => 'Teklif ücreti yazı ile belirtilmelidir.',
            'offer_amount_text.string' => 'Teklif ücreti yazı ile geçerli bir metin olmalıdır.',
            'expiration_date.required' => 'Son geçerlilik tarihi zorunludur.',
            'expiration_date.date' => 'Son geçerlilik tarihi geçerli bir tarih olmalıdır.',
            'expiration_date.after_or_equal' => 'Son geçerlilik tarihi bugünden sonra olmalıdır.',
            'offer_description.string' => 'Teklif açıklaması geçerli bir metin olmalıdır.',
            'quantity.required' => 'Miktar alanı zorunludur.',
            'quantity.integer' => 'Miktar sayısal bir değer olmalıdır.',
        ];
    }

    /**
     * Additional filtering and sanitization after validation
     *
     * @param \Illuminate\Validation\Validator $validator
     */
    protected function passedValidation()
    {
        $this->sanitizeInputs();

        $this->sanitizeLinuxCommands();
    }

    protected function sanitizeInputs()
    {
        $input = $this->all();

        foreach ($input as $key => $value) {
            if (is_string($value)) {
                $this->merge([$key => filter_var($value, FILTER_SANITIZE_STRING)]);
            }
        }
    }

    protected function sanitizeLinuxCommands()
    {
        $input = $this->all();

        foreach ($input as $key => $value) {
            if (is_string($value)) {
                $this->merge([$key => preg_replace('/[;&|`$(){}?<>^]/', '', $value)]);
            }
        }
    }
}
