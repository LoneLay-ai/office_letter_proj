<?php

namespace App\View\Components;

use Illuminate\View\Component;

class banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $now;
    public function __construct($data)
    {
        $this->now = $data;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
