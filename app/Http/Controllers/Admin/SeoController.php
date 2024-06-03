<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Seo\Admin\CreateSeoAction;
use App\Actions\Seo\Admin\DeleteSeoAction;
use App\Actions\Seo\Admin\FindSeoByIdAction;
use App\Actions\Seo\Admin\UpdateSeoAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seo\CreateSeoRequest;
use App\Http\Requests\Seo\UpdateSeoRequest;
use App\Http\Resources\SeoResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SeoController extends Controller
{
    public function __construct(
        protected FindSeoByIdAction $findSeoByIdAction,
        protected UpdateSeoAction   $updateSeoAction,
        protected CreateSeoAction   $createSeoAction,
        protected DeleteSeoAction   $deleteSeoAction
    )
    {
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Seo/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Seo/Modify');
    }

    public function store(CreateSeoRequest $request): RedirectResponse
    {
        $this->createSeoAction->run($request->validated());
        return redirect()->route('admin.seo.index');
    }

    public function edit(int $id): Response
    {
        $seo = $this->findSeoByIdAction->run($id);

        return Inertia::render('Admin/Seo/Modify', [
            'seo' => new SeoResource($seo),
        ]);
    }

    public function update(UpdateSeoRequest $request, int $id): RedirectResponse
    {
        $this->updateSeoAction->run($request->validated(), $id);
        return redirect()->route('admin.seo.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteSeoAction->run($id);
        return back();
    }
}
