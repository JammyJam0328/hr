<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class ErrorMessage extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.error-message');
    }
}