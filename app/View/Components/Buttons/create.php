<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class create extends Component
{

    public String $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.create');
    }
}
