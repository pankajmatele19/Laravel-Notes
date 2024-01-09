<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $placeholder;
    public $type;
    public $label;
    /**
     * Create a new component instance.
     */
    public function __construct($type,$name,$placeholder,$label)
    {
        $this ->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
