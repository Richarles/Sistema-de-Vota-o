<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Validation extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    //public $message;
    /**
     * The alert type.
     *
     * @var string
     */
    public $name;
    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        //$this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.validation');
    }
}
