<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkButton extends Component
{
    public $href;
    public $colored;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $href = '#', bool $colored = false)
    {
        $this->href = $href;
        $this->colored = $colored;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link-button');
    }
}
