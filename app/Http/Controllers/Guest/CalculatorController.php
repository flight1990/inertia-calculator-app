<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Calculators\Guest\AttachSavedCalculatorAction;
use App\Actions\Calculators\Guest\DeleteSavedCalculatorAction;
use App\Actions\Calculators\Guest\FindCalculatorAction;
use App\Actions\Categories\Guest\FindCategoryAction;
use App\Actions\Menu\GetMenuToTreeForParentSelectorAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calculators\SaveUsedCalculatorRequest;
use App\Http\Resources\CalculatorResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function __construct(
        protected FindCategoryAction                   $findGuestCategoryAction,
        protected FindCalculatorAction                 $findGuestCalculatorAction,
        protected AttachSavedCalculatorAction          $attachSavedCalculatorAction,
        protected DeleteSavedCalculatorAction          $deleteSavedCalculatorAction
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

    public function store(SaveUsedCalculatorRequest $request): RedirectResponse
    {
        $this->attachSavedCalculatorAction->run($request->validated());
        return redirect(strtok(back()->getTargetUrl(), '?') . '?data=' . $request->get('input'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteSavedCalculatorAction->run($id);
        return back();
    }

    public function processing(Request $request, string $uuid)
    {
        $pathToPhpFile = Storage::path("calcs/{$uuid}/backend.php");
        include_once $pathToPhpFile;
    }
}
