<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return  [
          'author_name' => $this->author_name,
          'author_contact_no' => $this->author_contact_no,
          'author_country' => $this->author_country
        ];
    }
}
