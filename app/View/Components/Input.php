<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $name,
        public $placeholder = null,
        public $id = null,
        public $label = null,
        public $type = "text",
        public $value = null,
        public $class = null,
        public $disabled = null,
        public $formClass = null,
        public $multiple = false,
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
