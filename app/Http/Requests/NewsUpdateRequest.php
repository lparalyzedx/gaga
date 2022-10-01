<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:255|unique:news,title,'.$this->id.',id',
            'description' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.unique' => 'Bu başlık zaten mevcut.',
            'title.min' => 'Başlık alanı en az 5 karakter olabilir.',
            'title.max' => 'Başlık alanı en fazla 255 karakter olabilir.',
            'description.required' => 'Açıklama alanı zorunludur.',
            'description.min' => 'Açıklama alanı en az 5 karakter olmalıdır.',
            'image.required' => 'Resim alanı zorunludur.',
            'images.required' => 'Resim alanı zorunludur.',
            'image.image' => 'Lütfen geçerli bir fotoğraf dosyası yükleyin.',
            'image.mimes' => 'Fotoğraf dosya uzantısı desteklenmiyor.',
            'images.*.image' => 'Resim alanı resim dosyası olmalıdır.',
            'images.*.required' => 'Resim alanı zorunludur.',
            'images.*.mimes' => 'Resim uzantısı .png, .jpg, .jpeg olmalıdır.'
        ];
    }
}
