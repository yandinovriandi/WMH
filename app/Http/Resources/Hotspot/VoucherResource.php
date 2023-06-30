<?php

namespace App\Http\Resources\Hotspot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['.id'],
            'username' => $this['name'],
            'password' => $this['password'] ?? null,
            'profile' => $this['profile'] ?? null,
            'uptime' => $this['uptime'],
            'upload' => $this['bytes-in'],
            'download' => $this['bytes-out'],
            'status' => $this['disabled'] ?? null,
            'comment' => $this['comment'] ?? null
        ];
    }
}
