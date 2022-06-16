<?php

namespace App\View\Components;

use Illuminate\View\Component;

class link extends Component
{
    public $href;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $href = '', string $color = 'text-gray-500')
    {
        $this->href =  $href;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link');
    }
}
