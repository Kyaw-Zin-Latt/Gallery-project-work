<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuTitle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title, $class, $link;

    public function __construct($title="Title", $class="icon" ,$link="#")
    {
        $this->title = $title;
        $this->class = $class;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-title');
    }
}
