<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
            'visibility' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kategori adı boş bırakılamaz.',
            'name.unique' => 'Kategori adı zaten mevcut.',
            'visibility.required' => 'Lütfen bir görünürlük Seçiniz'
        ];
    }
}
