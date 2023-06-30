<?php

namespace App\View\Components\Mikrotik;

use App\Models\Mikrotik;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMikrotikLayout extends Component
{
    public $mikrotik;

    public function __construct(Mikrotik $mikrotik)
    {
        $this->mikrotik = $mikrotik;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.mikrotik.sidebar',[
            'mikrotik' => $this->mikrotik
        ]);
    }
}
