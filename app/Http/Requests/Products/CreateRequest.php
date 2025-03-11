<?php

namespace App\Http\Requests\Products;

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
            'name' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:ON_SALE,NOT_FOR_SALE,PENDING',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Ürün adı boş olamaz.',
            'name.string' => 'Ürün adı geçersiz bir formatta.',
            'name.max' => 'Ürün adı en fazla 255 karakter olmalıdır.',
            'unit_price.required' => 'Birim fiyatı girilmelidir.',
            'unit_price.numeric' => 'Birim fiyatı sayısal olmalıdır.',
            'unit_price.min' => 'Birim fiyatı sıfırdan büyük olmalıdır.',
            'quantity.required' => 'Adet bilgisi gereklidir.',
            'quantity.integer' => 'Adet bir tamsayı olmalıdır.',
            'quantity.min' => 'Adet en az 1 olmalıdır.',
            'description.string' => 'Açıklama geçersiz formatta.',
            'status.required' => 'Ürün durumu seçilmelidir.',
            'status.in' => 'Geçersiz ürün durumu seçildi.',
        ];
    }

    /**
     * Sanitize the input data to prevent potential malicious code and injection.
     */
    public function sanitizeInput()
    {
        $input = $this->all();

        foreach ($input as $key => $value) {
            if (is_string($value)) {
                $input[$key] = strip_tags($value);
                $input[$key] = escapeshellcmd($value);
                $input[$key] = escapeshellarg($value);
            }
        }

        $this->replace($input);
    }

    /**
     * After validation, sanitize input data.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $this->sanitizeInput();
        });
    }
}
