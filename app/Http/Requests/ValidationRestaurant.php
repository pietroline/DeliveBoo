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
            "vat" => "required | min:11 | max:11",
            "typologies" => "required"
        ];
    }
}
