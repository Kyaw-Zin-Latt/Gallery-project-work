<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteConfirmModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title, $name, $delOnly;
    public function __construct($title,$name,$delOnly)
    {
        $this->title = $title;
        $this->name = $name;
        $this->delOnly = $delOnly;
//        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-confirm-modal');
    }
}
