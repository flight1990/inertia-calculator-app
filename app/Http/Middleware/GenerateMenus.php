<?php

namespace App\Http\Middleware;

use App\Actions\Calculators\Guest\GetFavoritesCalculatorsAction;
use App\Actions\Categories\Guest\GetCategoriesAction;
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

            $categories = app(GetCategoriesAction::class)->run();

            foreach ($categories as $category) {
                $menu->add($category->name, ['disableActivationByURL' => true, 'url' => '#'])
                    ->attr(['icon' => $category->icon])
                    ->nickname($category->slug);

                foreach ($category->calculators as $calculator) {
                    $menu->item($category->slug)
                        ->add($calculator->name, route('calculators.show', $calculator->slug))
                        ->attr(['icon' => $category->icon]);
                }
            }
        });
    }

    private function buildAdminMenu(): void
    {
        Menu::make('Menu', function ($menu) {
            $menu->add('Панель управления', route('admin.index'))->nickname('dashboard');
            $menu->add('Категории', route('admin.categories.index'))->nickname('admin.categories.index');
            $menu->add('Калькуляторы', route('admin.calculators.index'))->nickname('admin.calculators.index');
            $menu->add('FAQ', route('admin.faq.index'))->nickname('admin.faq.index');
            $menu->add('SEO', route('admin.seo.index'))->nickname('admin.seo.index');
            $menu->add('Пользователи', route('admin.users.index'))->nickname('admin.users.index');
        });
    }
}
