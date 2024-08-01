<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Calculators\Admin\CreateCalculatorAction;
use App\Actions\Calculators\Admin\DeleteCalculatorAction;
use App\Actions\Calculators\Admin\FindCalculatorByIdAction;
use App\Actions\Calculators\Admin\UpdateCalculatorAction;
use App\Actions\Categories\Admin\GetCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calculators\CreateCalculatorRequest;
use App\Http\Requests\Calculators\UpdateCalculatorRequest;
use App\Http\Resources\CalculatorResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function __construct(
        protected FindCalculatorByIdAction             $findCalculatorByIdAction,
        protected UpdateCalculatorAction               $updateCalculatorAction,
        protected CreateCalculatorAction               $createCalculatorAction,
        protected DeleteCalculatorAction               $deleteCalculatorAction,
        protected GetCategoriesAction                  $getCategoriesAction
    )
    {
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Calculators/Index');
    }

    public function create(): Response
    {
        $categories = $this->getCategoriesAction->run();

        return Inertia::render('Admin/Calculators/Modify', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function store(CreateCalculatorRequest $request): RedirectResponse
    {
        $this->createCalculatorAction->run($request->validated());
        return redirect()->route('admin.calculators.index');
    }

    public function edit(int $id): Response
    {
        $calculator = $this->findCalculatorByIdAction->run($id);
        $categories = $this->getCategoriesAction->run();

        return Inertia::render('Admin/Calculators/Modify', [
            'calculator' => new CalculatorResource($calculator),
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function update(UpdateCalculatorRequest $request, int $id): RedirectResponse
    {
        $this->updateCalculatorAction->run($request->validated(), $id);
        return redirect()->route('admin.calculators.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteCalculatorAction->run($id);
        return back();
    }
}
