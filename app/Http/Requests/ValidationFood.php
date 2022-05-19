<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidationFood extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required | min:3",
            "category_id" => "required | exists:categories,id",
            "price" => "required | numeric | min:0 | max:1000",
            "ingredients" => "required | min:5",
            "visible" => "required | boolean",
            'img' => 'nullable | mimes:jpeg,png,jpg,gif,svg | max:2048',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome portata',
            'category_id' => 'Categoria',
            'price' => 'Prezzo',
            'ingredients' => 'Ingredienti',
            'visible' => 'Disponibilità',
            'img' => 'immagine'
        ];

    }
    
}

