<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingUpdateRequest extends FormRequest
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
            'name' => 'required|unique:trainings,name,'.$this->id.',id',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Eğitim adı boş bırakılamaz.',
            'name.unique' => 'Bu eğitim adı zaten mevcut.',
            'description.required' => 'Açıklama boş bırakılamaz.',
            'image.required' => 'Resim boş bırakılamaz.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyiniz.',
            'image.mimes' => 'Geçersiz dosya uzantısı.'
        ];
    }
}
