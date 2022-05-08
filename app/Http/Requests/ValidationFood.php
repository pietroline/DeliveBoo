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
            "category_id" => "required | exists:categories,id | min:1",
            "price" => "required | numeric | min:0 | max:1000",
            "visible" => "required | boolean"
        ];
    }
}

