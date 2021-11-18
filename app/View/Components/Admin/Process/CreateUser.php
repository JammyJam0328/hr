<?php

namespace App\View\Components\Admin\Process;

use Illuminate\View\Component;

class CreateUser extends Component
{
    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.process.create-user');
    }
}