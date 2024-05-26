<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Calculators\FindGuestCalculatorAction;
use App\Actions\Categories\FindGuestCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use App\Http\Resources\CategoryResource;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function __construct(
        protected FindGuestCategoryAction   $findGuestCategoryAction,
        protected FindGuestCalculatorAction $findGuestCalculatorAction
    )
    {
    }

    public function show(string $slug): Response
    {
        $calculator = $this->findGuestCalculatorAction->run($slug);
        $category = $this->findGuestCategoryAction->run($calculator['category_id'], $calculator['id']);

        return Inertia::render('Guest/Calculator', [
            'calculator' => new CalculatorResource($calculator),
            'category' => new CategoryResource($category)
        ]);
    }
}
