<?php

namespace App\View\Components;

use App\Models\Aboutus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutUsComponents extends Component
{
    /**
     * Create a new component instance.
     */
    public $aboutUs;
    public function __construct()
    {
        $this->aboutUs = Aboutus::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-us-components');
    }
}
