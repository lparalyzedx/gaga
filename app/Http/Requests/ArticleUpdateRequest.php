<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'title' => 'required|unique:studioarticles,title,'.$this->id.',id',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'images' => 'nullable',
            'category_id' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık boş bırakılamaz.',
            'title.unique' => 'Bu başlıkta makale zaten mevcut.',
            'description.required' => 'Açıklama boş bırakılamaz.',
            'image.required' => 'Resim boş bırakılamaz.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
            'image.mimes' => 'Resim dosya uzantısı desteklenmiyor.',
            'images.*.image' => 'Resim alanı resim dosyası olmalıdır.',
            'images.*.required' => 'Resim alanı zorunludur.',
            'images.*.mimes' => 'Resim uzantısı .png, .jpg, .jpeg olmalıdır.',
            'category_id.required' => 'Kategori zorunludur.'
        ];
    }
}
