<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{

    public String $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.page-title');
    }
}
