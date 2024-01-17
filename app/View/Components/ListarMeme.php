<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListarMeme extends Component
{
    public $memes;
    public function __construct($memes)
    {
        $this->memes = $memes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-meme');
    }
}
