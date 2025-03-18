<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $response = ApiResponse::sendResponse(422, "Validation Error", $validator->messages()->all());
            throw new \Illuminate\Validation\ValidationException($validator, $response);
        }
    }

    public function rules(): array
    {
        return [
            'author_name' => 'required',
            'author_contact_no' => 'required|unique:authors,author_contact_no',
            'author_country' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'author_name' => 'Author Name',
            'author_contact_no' => 'Author Contact No',
            'author_country' => 'Author Country',
        ];
    }
}
