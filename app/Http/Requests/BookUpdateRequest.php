<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'author' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'quantity' => ['required', 'string'],
            'sprice' => ['required'],
            'price' => ['required'],
            'description' => ['required', 'string'], 
            'pages' => ['required'], 
            'meta_title' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
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
