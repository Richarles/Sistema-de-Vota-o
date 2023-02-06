<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $title;

    /**
     * The alert message.
     *
     * @var string
     */
    public $id;

    /**
     * The alert message.
     *
     * @var string
     */
    //public $item;

    /**
     * The alert message.
     *
     * @var string
     */
    //public $message;
    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  string  $id
     * @return void
     */
    public function __construct($title,$id)
    {
        $this->title = $title;
        $this->id = $id;
        //$this->$item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
