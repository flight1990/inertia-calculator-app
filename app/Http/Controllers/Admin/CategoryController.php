<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\Admin\CreateCategoryAction;
use App\Actions\Categories\Admin\DeleteCategoryAction;
use App\Actions\Categories\Admin\FindCategoryByIdAction;
use App\Actions\Categories\Admin\GetCategoriesAction;
use App\Actions\Categories\Admin\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function __construct(
        protected GetCategoriesAction    $getAdminCategoriesAction,
        protected FindCategoryByIdAction $findCategoryByIdAction,
        protected UpdateCategoryAction   $updateCategoryAction,
        protected CreateCategoryAction   $createCategoryAction,
        protected DeleteCategoryAction   $deleteCategoryAction
    )
    {
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Categories/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Categories/Modify');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->createCategoryAction->run($request->validated());
        return redirect()->route('admin.categories.index');
    }

    public function edit(int $id): Response
    {
        $category = $this->findCategoryByIdAction->run($id);

        return Inertia::render('Admin/Categories/Modify', [
            'category' => new CategoryResource($category)
        ]);
    }

    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $this->updateCategoryAction->run($request->validated(), $id);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteCategoryAction->run($id);
        return back();
    }
}
