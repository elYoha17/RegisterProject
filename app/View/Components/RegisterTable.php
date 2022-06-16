<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RegisterTable extends Component
{
    public $registers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $registers = null)
    {
        $this->registers = $registers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-table');
    }
}
