<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'IDs' => $this->id,
          'about us' => $this->about_us,
          'why us' => $this->why_us,
          'goal' => $this->goal,
          'vision' => $this->vision,
          'about footer' => $this->about_footer,
        ];
    }
}
