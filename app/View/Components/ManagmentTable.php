<?php

namespace App\View\Components;

use App\Models\Register;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class ManagmentTable extends Component
{
    public $register;
    public $agents;
    public $presents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Register $register, Collection $agents = null, Collection $presents = null)
    {
        $this->register = $register;
        $this->agents = $agents;
        $this->presents = $presents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.managment-table');
    }
}
