<?php

namespace App\View\Components\Admin\Process;

use Illuminate\View\Component;

class CreateEmployee extends Component
{
    public $departments;
    public $heads;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($departments,$heads)
    {
        $this->departments = $departments;
        $this->heads = $heads;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.process.create-employee');
    }
}