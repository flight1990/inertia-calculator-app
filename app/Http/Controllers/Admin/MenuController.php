<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Menu\CreateMenuAction;
use App\Actions\Menu\DeleteMenuAction;
use App\Actions\Menu\FindMenuByIdAction;
use App\Actions\Menu\GetMenuToTreeAction;
use App\Actions\Menu\RebuildMenuTreeAction;
use App\Actions\Menu\UpdateMenuAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Http\Resources\MenuResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    public function __construct(
        protected GetMenuToTreeAction $getMenuToTreeAction,
        protected CreateMenuAction $createMenuAction,
        protected UpdateMenuAction $updateMenuAction,
        protected DeleteMenuAction $deleteMenuAction,
        protected RebuildMenuTreeAction $rebuildMenuTreeAction,
        protected FindMenuByIdAction $findMenuByIdAction
    )
    {
    }

    public function index(Request $request): Response
    {
        $menus = $this->getMenuToTreeAction->run();

        return Inertia::render('Admin/Menus/Index', [
            'items' => MenuResource::collection($menus)
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Menus/Modify');
    }

    public function edit(int $id): Response
    {
        $menu = $this->findMenuByIdAction->run($id);

        return Inertia::render('Admin/Menus/Modify', [
            'item' => new MenuResource($menu)
        ]);
    }

    public function store(CreateMenuRequest $request): RedirectResponse
    {

        $this->createMenuAction->run($request->validated());
        return redirect()->route('admin.menus.index');
    }

    public function update(UpdateMenuRequest $request, int $id): RedirectResponse
    {
        $this->updateMenuAction->run($request->validated(), $id);
        return redirect()->route('admin.menus.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteMenuAction->run($id);
        return redirect()->route('admin.menus.index');
    }

    public function rebuild(Request $request): RedirectResponse
    {
        $this->rebuildMenuTreeAction->run($request->all());
        return redirect()->route('admin.menus.index');
    }
}
