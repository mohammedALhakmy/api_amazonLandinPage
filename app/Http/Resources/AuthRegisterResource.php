<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthRegisterResource extends JsonResource
{
    private $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }
    public function toArray(Request $request): array
    {
        return  [
            'IDs' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
//            'token' => $this->token,
        ];
    }
}
