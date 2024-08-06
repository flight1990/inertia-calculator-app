<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Calculators\Guest\AttachFavoriteCalculatorAction;
use App\Actions\Calculators\Guest\DetachFavoriteCalculatorAction;
use App\Actions\Calculators\Guest\GetFavoritesCalculatorsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class FavoriteController extends Controller
{
    public function __construct(
        protected GetFavoritesCalculatorsAction  $getGuestFavoritesCalculatorsAction,
        protected AttachFavoriteCalculatorAction $attachFavoriteCalculatorAction,
        protected DetachFavoriteCalculatorAction $detachFavoriteCalculatorAction
    )
    {
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
