<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class delete extends Component
{

    public $route;
    public $id;
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $id, $item)
    {
        $this->route = $route;
        $this->id = $id;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.delete');
    }
}
