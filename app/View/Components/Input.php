<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        protected $name, 
        protected $text = '', 
        protected $icon = null,
        protected $texto_ajuda = null)
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return function($data){
            $data['attributes']->merge([
                'type' => 'text'
            ]);

            return view('components.input')->with([
                'name' => $this->name,
                'text' => $this->text,
                'texto_ajuda' => $this->texto_ajuda,
                'icon' => $this->icon,
                'attributes' => $data['attributes']
            ])->render();
        };
     
    }
}
