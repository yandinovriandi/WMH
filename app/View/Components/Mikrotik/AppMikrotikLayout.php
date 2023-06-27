<?php

namespace App\View\Components\Mikrotik;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppMikrotikLayout extends Component
{
    /**
     * @var mixed|string
     */
    public mixed $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = 'WHM')
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('layouts.mikrotik.app-layout');
    }
}
