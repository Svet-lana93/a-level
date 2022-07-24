<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Collection;

class Layout extends Component
{
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = collect(config('menu'))->map(
            function ($item) {
                $item['active'] = request()->routeIs($item['route']);
                return $item;
            }
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Factory
     */
    public function render()
    {
        return view('components.layout');
    }
}
