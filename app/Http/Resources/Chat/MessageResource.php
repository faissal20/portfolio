<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message' => $this->content,
            'from' => $this->whenLoaded('from', function () {
                return [
                    'id' => $this->from->id,
                    'username' => $this->from->username,
                ];
            }),
            'to' => $this->whenLoaded('to', function () {
                return [
                    'id' => $this->to->id,
                    'username' => $this->to->username,
                ];
            }),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'created_at_human' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'updated_at_human' => $this->updated_at->diffForHumans(),
        ];
    }
}
