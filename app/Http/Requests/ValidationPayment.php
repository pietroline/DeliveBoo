<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidationPayment extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required | min:3",
            "address" => "required | min:5",
            "phone" => "required | string | min:6 | max:15",
            "total" => "required | numeric | min:0 | max:1000000000",
            "surname" => "required | min:3",
            "cardNumber" => "required | numeric | digits:16",
            "cvv" => "required | numeric | digits:3",
            "expirationMonth" => "required | numeric | min:1 | max:12",
            "expirationYear" => "required | numeric | min: 2000 | max: 2100",
            "paymentMethod" => "required | numeric | min:1 | max:2",
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
            'name' => 'Nome',
            'address' => 'Indirizzo',
            'phone' => 'Numero di telefono',
            "surname" => "Cognome",
            "cardNumber" => "Numero carta",
            "cvv" => "cvv",
            "expirationMonth" => "mese scadenza",
            "expirationYear" => "anno scadenza",
            "paymentMethod" => "medodo pagamento",
            'total' => 'totale',
        ];

    }
}
