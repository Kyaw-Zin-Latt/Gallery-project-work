<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PhotoUpload extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link, $id, $name, $formId, $method;

    public function __construct($link,$id,$name,$formId)
    {
        $this->link = $link;
        $this->id = $id;
        $this->name= $name;
        $this->formId = $formId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.photo-upload');
    }
}
