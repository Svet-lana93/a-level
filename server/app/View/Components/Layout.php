<?php

namespace App\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Collection;

class Layout extends Component
{
    //public $menu;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Route $route)
    {
        $this->route = $route::currentRouteName();
        /*
        $this->menu = collect(config('menu'))->map(
            function ($item) {
                $item['active'] = request()->routeIs($item['route']);
                return $item;
            }
        );
        */
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
