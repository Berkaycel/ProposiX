<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
        return $this->input('user_type') === 'customer'
            ? $this->customerRules()
            : $this->companyRules();
    }

    private function customerRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8', 'max:50'],
            'identity' => ['required', 'string', 'size:11', 'regex:/^[1-9]{1}[0-9]{9}[02468]{1}$/'],
            'phone' => ['nullable', 'string', 'regex:/^05\d{9}$/'],
            'address' => ['nullable', 'string', 'max:500'],
        ];
    }

    private function companyRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8', 'max:50'],
            'trade_registry' => ['required', 'string', 'min:3', 'alpha_num'],
            'tax_no' => ['required', 'digits:10'],
            'tax_identity_no' => ['required', 'digits:10'],
            'phone' => ['nullable', 'string', 'regex:/^05\d{9}$/'],
            'address' => ['nullable', 'string', 'max:500'],
            'company_name' => ['nullable', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad alanı zorunludur.',
            'name.string' => 'Ad yalnızca metin içermelidir.',
            'name.max' => 'Ad en fazla 255 karakter olabilir.',

            'email.required' => 'E-posta alanı zorunludur.',
            'email.string' => 'E-posta geçerli bir formatta olmalıdır.',
            'email.lowercase' => 'E-posta küçük harflerle olmalıdır.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta en fazla 255 karakter olabilir.',
            'email.unique' => 'Bu e-posta adresi zaten kullanımda.',

            'password.required' => 'Şifre alanı zorunludur.',
            'password.confirmed' => 'Şifre doğrulama eşleşmiyor.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.max' => 'Şifre en fazla 50 karakter olabilir.',

            'identity.required' => 'TC Kimlik Numarası zorunludur.',
            'identity.string' => 'TC Kimlik Numarası yalnızca rakam içermelidir.',
            'identity.size' => 'TC Kimlik Numarası tam olarak 11 haneli olmalıdır.',
            'identity.regex' => 'Geçerli bir TC Kimlik Numarası giriniz.',

            'phone.regex' => 'Telefon numarası 05XXXXXXXXX formatında olmalıdır.',

            'trade_registry.required' => 'Ticaret sicil numarası zorunludur.',
            'trade_registry.string' => 'Ticaret sicil numarası metin formatında olmalıdır.',
            'trade_registry.min' => 'Ticaret sicil numarası en az 3 karakter içermelidir.',
            'trade_registry.alpha_num' => 'Ticaret sicil numarası sadece harf ve rakam içermelidir.',

            'tax_no.required' => 'Vergi numarası zorunludur.',
            'tax_no.digits' => 'Vergi numarası tam olarak 10 haneli olmalıdır.',

            'tax_identity_no.required' => 'Vergi kimlik numarası zorunludur.',
            'tax_identity_no.digits' => 'Vergi kimlik numarası tam olarak 10 haneli olmalıdır.',

            'address.string' => 'Adres bilgisi geçerli bir formatta olmalıdır',
            'address.max' => 'Adres en fazla 500 karakter olabilir.',

            'company_name.string' => 'Adres bilgisi geçerli bir formatta olmalıdır',
            'company_name.max' => 'Adres en fazla 500 karakter olabilir.',
        ];
    }
}
