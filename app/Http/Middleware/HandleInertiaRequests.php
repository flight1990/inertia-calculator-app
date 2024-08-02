<?php

namespace App\Http\Middleware;

use App\Actions\Calculators\Guest\GetFavoritesCalculatorsAction;
use App\Actions\Seo\Guest\GetSeoAction;
use App\Http\Resources\SeoGuestResource;
use App\Http\Resources\SeoResource;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Menu;
use App\Http\Resources\NavigationResource;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'session' => Session::get('processing'),
            'auth' => [
                'user' => $request->user()
                    ? $request->user()->only(['id', 'name', 'email', 'email_verified_at'])
                    : null,
                'favorites' => app(GetFavoritesCalculatorsAction::class)->run(),
            ],
            'menu' => NavigationResource::collection(Menu::get('Menu')->roots()),
            'site_settings' => Config::get('settings'),
            'metta_seo' => !$request->routeIs('admin.*')
                ? new SeoGuestResource(app(GetSeoAction::class)->run($request->url()))
                : []
        ];
    }
}
