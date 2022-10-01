<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleCreateRequest extends FormRequest
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
            'name' => 'required|unique:peoples,name',
            'rank' => 'required',
            'about' => 'nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad soyad alanı boş bırakılamaz.',
            'name.unique' => 'Ad soyad zaten sistemde kayıtlı.',
            'rank.required' => 'Unvan alanı boş bırakılamaz.',
            'about.required' => 'Hakkında alanı boş bırakılamaz.',
            'image.required' => 'Fotoğraf alanı boş bırakılamaz',
            'image.image' => 'Lütfen geçerli bir fotoğraf dosyası yükleyin.',
            'image.mimes' => 'Fotoğraf dosya uzantısı desteklenmiyor.',
        ];
    }
}
