<?php

namespace App\View\Components;

use Closure;
use App\Models\Equipment;
use App\Models\Department;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class HomeComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $departments;
    public $equipment;

    public function __construct()
    {

        $this->departments = Department::active()->get();
        $this->equipment = Equipment::get('image');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-component');
    }
}
