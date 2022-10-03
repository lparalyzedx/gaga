<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'newPassword' => 'required|min:5|max:255',
            'newPassword2' => 'required|same:newPassword'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Şifre boş bırakılamaz.',
            'newPassword.required' => 'şifre boş bırakılamaz.',
            'newPassword.min' => 'Şifre en az 5 karakter olmalıdır.',
            'newPassword.max' => 'Şifre en az 255 karakter olmalıdır.',
            'newPassword2.same' => 'Şifreler eşleşmiyor.',

        ];
    }
}
