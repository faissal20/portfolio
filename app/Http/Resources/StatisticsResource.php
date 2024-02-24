<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'heart_storage' => $this->heart_storage,
            'knowledge' => $this->knowledge,
            'happiness' => $this->happiness,
            'missing' => $this->missing,
            'made_for_each_other' => $this->made_for_each_other,
        ];
    }
}
