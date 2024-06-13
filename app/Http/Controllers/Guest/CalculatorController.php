<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Calculators\Guest\FindCalculatorAction;
use App\Actions\Categories\Guest\FindCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function __construct(
        protected FindCategoryAction   $findGuestCategoryAction,
        protected FindCalculatorAction $findGuestCalculatorAction
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

    public function processing(Request $request, string $uuid)
    {
        $pathToPhpFile = Storage::path("calcs/{$uuid}/backend.php");

        include_once $pathToPhpFile;
    }
}
