<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideUpdateRequest extends FormRequest
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
            'title' => 'required|max:255|unique:homepages,title,'. $this->id .',id',
            'text' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı boş bırakılamaz.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'title.unique' => 'Bu başlık başka bir slaytta kullanılıyor.',
            'text.required' => 'Açıklama alanı boş bırakılamaz.',
            'image.required' => 'Resim alanı boş bırakılamaz.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
            'image.mimes' => 'Resim dosya uzantısı desteklenmiyor.',
        ];
    }
}
