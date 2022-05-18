<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidationRestaurant extends FormRequest
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
            "address" => "required | min:5",
            "phone" => "required | string | min:6 | max:15",
            "email" => "required | email",
            "vat" => "required | digits:11 | unique:restaurants,vat",
            "typologies" => "required",
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
            'name' => 'Nome ristorante',
            'address' => 'Indirizzo ristorante',
            'phone' => 'Numero di telefono ristorante',
            'email' => 'Email ristorante',
            'vat' => 'Partita IVA ristorante',
            'typologies' => 'Email ristorante',
            'img' => 'immagine'
        ];

    }
}
