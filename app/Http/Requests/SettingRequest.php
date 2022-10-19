<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|image|mimes:png,jpg,webp,ico,jpeg',
            'favicon' => 'nullable|image|mimes:png,jpg,webp,ico,jpeg,svg',
            'facebook' => 'nullable|active_url',
            'instagram' => 'nullable|active_url',
            'linkedin' => 'nullable|active_url',
            'youtube' => 'nullable|active_url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|min:10|max:11|regex:/[0-9]{9}/',
            'address' => 'nullable|string',
            'company_description' => 'nullable|min:20',
            'policy' => 'nullable|min:20',
            'map' => 'nullable',
            'terms' => 'nullable',
            'whyus' => 'nullable'
        ];
    }

    public function messages()
    {
        return[
            'icon.image' => 'İkon resim olmalıdır.',
            'favicon.image' => 'Favicon resim olmalıdır.',
            'icon.mimes' => 'İkon sadece .png, .jpg, .jpeg, .webp, .ico, .svg olmalıdır.',
            'favicon.mimes' => 'Favicon sadece .png, .jpg, .jpeg, .webp, .ico olmalıdır.',
            'facebook.active_url' => 'Facebook url`i geçerli değil.',
            'instagram.active_url' => 'İnstagram url`i geçerli değil.',
            'youtube.active_url' => 'Youtube url`i geçerli değil.',
            'linkedin.active_url' => 'Linkedin url`i geçerli değil',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'address.string' => 'Adres alanı yazı olmalıdır.',
            'phone.min' => 'Telefon numarası en az 10 karakter olmalıdır.',
            'phone.max' => 'Telefon numarası en fazla 12 karakter olmalıdır.',
            'company_description.min' => 'Firma açıklaması en az 20 karakter olmalıdır.',
            'policy.min' => 'KVKK politikası en az 20 karakter olmalıdır.',
        ];
    }
}
