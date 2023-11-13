<?php

namespace App\Http\Resources\Complain;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'body' => $this->body,
            'is_solved' => $this->is_solved,
            'id' => $this->id,
            'theme_id' => $this->theme_id,
            'user' => UserResource::make($this->user)->resolve(),
            'message_id' => $this->message_id,
        ];
    }
}
