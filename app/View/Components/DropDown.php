<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropDown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $label,
        public $class = '',
        public $direction = 'down',
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.drop-down')->with([
            'label'=>$this->label,
            'class'=>$this->class,
            'direction'=>$this->direction
        ]);
    }
}
