<?php

namespace App\Http\Middleware;

use App\Actions\Seo\Guest\GetSeoAction;
use App\Http\Resources\SeoGuestResource;
use App\Http\Resources\SeoResource;
use Menu;
use App\Http\Resources\MenuResource;
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
            'auth' => [
                'user' => $request->user()
                    ? $request->user()->only(['id', 'name', 'email', 'email_verified_at'])
                    : null,
            ],
            'menu' => MenuResource::collection(Menu::get('Menu')->roots()),
            'metta_seo' => in_array($request->route()->getName(), ['pages.index', 'calculators.show']) && !$request->routeIs('admin.*')
                ? new SeoGuestResource(app(GetSeoAction::class)->run($request->url()))
                : []
        ];
    }
}
