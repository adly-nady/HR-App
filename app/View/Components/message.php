<?php

namespace App\View\Components;

use Illuminate\View\Component;

class message extends Component
{
    public $messsage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($messsage)
    {
        $this->messsage = $messsage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}
