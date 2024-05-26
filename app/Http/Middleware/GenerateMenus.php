<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Menu;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenerateMenus
{
    public function handle(Request $request, Closure $next): Response
    {
        $request->routeIs('admin.*') ? $this->buildAdminMenu() : $this->buildGuestMenu();

        return $next($request);
    }

    private function buildGuestMenu(): void
    {
        Menu::make('Menu', function ($menu) {
            $menu->add('Home', route('pages.index'))->nickname('pages.index');

            if (!Auth::check()) {
                $menu->add('Login', route('login'))->nickname('login');
                $menu->add('Register', route('register'))->nickname('register');
            }
        });
    }

    private function buildAdminMenu(): void
    {
        Menu::make('Menu', function ($menu) {
            $menu->add('Dashboard', route('admin.index'));
        });
    }
}
