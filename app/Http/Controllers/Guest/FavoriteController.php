<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Calculators\AttachFavoriteCalculatorAction;
use App\Actions\Calculators\DetachFavoriteCalculatorAction;
use App\Actions\Calculators\GetGuestFavoritesCalculatorsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class FavoriteController extends Controller
{
    public function __construct(
        protected GetGuestFavoritesCalculatorsAction $getGuestFavoritesCalculatorsAction,
        protected AttachFavoriteCalculatorAction     $attachFavoriteCalculatorAction,
        protected DetachFavoriteCalculatorAction     $detachFavoriteCalculatorAction
    )
    {
    }

    public function index(): Response
    {
        $calculators = $this->getGuestFavoritesCalculatorsAction->run();

        return Inertia::render('Guest/Favorites', [
            'calculators' => CalculatorResource::collection($calculators)
        ]);
    }

    public function store(int $id): RedirectResponse
    {
        $this->attachFavoriteCalculatorAction->run($id);
        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->detachFavoriteCalculatorAction->run($id);
        return back();
    }
}
