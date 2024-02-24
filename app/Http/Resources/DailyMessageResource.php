<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'date' => $this->date,
            'seen' => (bool) $this->seen,
            'seenAt' => $this->seen_at,
            'createdAt' => $this->created_at->format('D d H:i'),
        ];
    }
}
