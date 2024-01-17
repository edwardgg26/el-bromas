<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meme extends Component
{
    public $meme;
    public function __construct($meme)
    {
        $this->meme = $meme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meme');
    }
}
