<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class counterPart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $studentsCount, public $coursesCount, public $people, public $teachersCount)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.counter-part');
    }
}