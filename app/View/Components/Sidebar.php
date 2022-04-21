<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void 
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = config('menu');
        $active = Route::currentRouteName();
        return view('components.sidebar',compact(['active','menus']));
    }



}
