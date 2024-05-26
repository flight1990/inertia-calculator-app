<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FavoriteController extends Controller
{
    public function index(): Response
    {
        $calculators = Auth::user()->favoriteCalculators()->get();

        return Inertia::render('Guest/Favorites', [
            'calculators' => CalculatorResource::collection($calculators)
        ]);
    }

    public function store(int $id): RedirectResponse
    {
        Auth::user()->favoriteCalculators()->attach($id);
        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        Auth::user()->favoriteCalculators()->detach($id);
        return back();
    }
}
