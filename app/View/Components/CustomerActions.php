<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerActions extends Component
{
    public string $edit;
    public string $destroy;

    /**
     * Create a new component instance.
     */
    public function __construct($edit, $destroy)
    {
        $this->edit = $edit;
        $this->destroy = $destroy;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer-actions');
    }
}
