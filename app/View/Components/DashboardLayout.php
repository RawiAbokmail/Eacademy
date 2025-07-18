<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardLayout extends Component
{

    public $title;
    public function __construct($title = 'Dashboard')
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard-layout', [
            'title' => $this->title,
        ]);
    }
}
