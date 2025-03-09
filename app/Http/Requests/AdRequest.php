<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'title' => 'required',
            'phone' => 'required|unique:messages,phone',
            'domain_id' => 'required|exists:domains,id',
            'text' => 'required',
            'slug' => 'required',
        ];
    }

    public function attributes()
    {
            return [
                'title' => 'title',
                'phone' => 'phone',
                'domain_id' => 'domain_id',
                'text' => 'text',
            ];
    }
}
