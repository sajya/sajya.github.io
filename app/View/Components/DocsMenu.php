<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Config\Repository;
use Illuminate\View\Component;

class DocsMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Repository $config, string $section = 'site.navigation')
    {
        $this->menu = $config->get($section);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.docs-menu', [
            'menu' => $this->menu
        ]);
    }
}
