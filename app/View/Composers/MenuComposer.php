<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;
use App\Models\Setting;

class MenuComposer
{
    public function compose(View $view)
    {
        $menu = Menu::where('location', 'header')->first();

        $menus = $menu
            ? $menu->items()
                ->whereNull('parent_id')
                ->with('children')
                ->orderBy('order')
                ->get()
            : collect();

        $view->with('menus', $menus);
        $view->with('setting', Setting::first());
    }
}