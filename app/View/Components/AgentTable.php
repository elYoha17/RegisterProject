<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class AgentTable extends Component
{
    public $agents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $agents = null)
    {
        $this->agents = $agents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.agent-table');
    }
}
