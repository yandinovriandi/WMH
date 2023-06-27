<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrafficInterfaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Rx' => [
                [
                    'x' => date('H:i:s'),
                    'y' => $this['rx-bits-per-second'],
                ],
            ],
            'Tx' => [
                [
                    'x' => date('H:i:s'),
                    'y' => $this['tx-bits-per-second'],
                ],
            ],
        ];
    }
}
