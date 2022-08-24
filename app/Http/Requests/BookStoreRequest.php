<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'quantity' => ['required', 'string'],
            'author' => ['required', 'string'],
            'price' => ['required'],
            'sprice' => ['required'],
            'description' => ['required', 'string'],
            'pages' => ['required'],
            'meta_title' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,jpeg,png'], 
            'category_ids'  => ['required'],
            'color_ids'  => ['required'],
        ];
    }
    public function messages()
    {   
        return [
            'category_ids.required' => 'Choose one or more category',
            'color_ids.required' => 'Choose at least one type',
        ];
    }
}
