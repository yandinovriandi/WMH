<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RouterboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uptime' => $this['uptime'],
            'version' => $this['version'],
            'freeMemory' => $this['free-memory'],
            'totalMemory' => $this['total-memory'],
            'cpu' => $this['cpu'],
            'cpuFrequency' => $this['cpu-frequency'],
            'cpuCount' => $this['cpu-count'],
            'cpuLoad' => $this['cpu-load'],
            'freeHdd' => $this['free-hdd-space'],
            'totalHdd' => $this['total-hdd-space'],
            'arc' => $this['architecture-name'],
            'boardName' => $this['board-name'],
            'freeMemorySpace' => formatByte($this['free-memory']),
            'totalMemorySpace' => formatByte($this['total-memory']),
            'freeHddSpace' => formatByte($this['free-hdd-space']),
            'totalHddSpace' => formatByte($this['total-hdd-space']),
            'hddUsage' => formatByte($this['total-hdd-space'] - $this['free-hdd-space']),
            'memoryUsage' => formatByte($this['total-memory']-$this['free-memory']),
        ];
    }
}
