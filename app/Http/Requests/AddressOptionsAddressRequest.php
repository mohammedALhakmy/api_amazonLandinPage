<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressOptionsAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'addr1' => 'required',
            'addr2' => 'required',
            'city' => 'required',
            'postcode' => 'required',

        ];
    }
}
