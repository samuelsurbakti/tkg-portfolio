<?php

namespace App\Providers;

use App\Models\Sys\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app('view')->composer('layouts.cc.app', function($view) {
            if(app('request')->route()) {
                $action = app('request')->route()->getAction();
                $exploid = 'Controllers\CC\\';
                $identifier = Str::of($action['controller'])->explode($exploid);
                $identifier = $identifier[1];
                $identifier = Str::of($identifier)->ltrim('\\');
                $menus = Menu::whereHas('get_role_for_menu', function ($q) {
                    $q->where('role_id', Auth::user()->getRoleIds()->first());
                })->whereNull('parent')->orderBy('order_number', 'asc')->get();

                list($controller, $action) = Str::of($identifier)->explode('@');
                $active_menu = Menu::where('source', '=', $controller)->first();

                if ($controller == 'Profile') {
                    $page_title = 'Profile';
                    $page_icon = 'bx bx-user-circle';
                } else {
                    $page_title = (!is_null($active_menu) ? $active_menu->title : '');
                    $page_icon = (!is_null($active_menu) ? $active_menu->icon : '');
                }
            } else {
                $action = app('request');
                $menus = Menu::withCount('get_child')->where('role', Auth::user()->getRoleIds()->first())->whereNull('parent')->orderBy('order_number', 'asc')->get();
                $page_title = 'Error';
                $controller = 'Error';
                $page_icon = 'fas fa-exclamation-triangle';
            }

            $view->with(compact('controller', 'action', 'page_title', 'page_icon', 'menus'));
        });
    }
}
