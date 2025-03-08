<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $response = ApiResponse::sendResponse(422, 'Validation Error', $validator->messages()->all());
//            $response = ApiResponse::sendResponse(422, 'Validation Error', $validator->errors());
            throw new \Illuminate\Validation\ValidationException($validator, $response);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:messages,email',
            'phone' => 'required',
            'message' => 'required',
        ];
    }
}
