<?php

namespace App\Http\Middleware;

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
        ];
    }
}
