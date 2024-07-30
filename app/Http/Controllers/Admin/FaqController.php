<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Faq\Admin\CreateFaqAction;
use App\Actions\Faq\Admin\DeleteFaqAction;
use App\Actions\Faq\Admin\FindFaqByIdAction;
use App\Actions\Faq\Admin\GetFaqsAction;
use App\Actions\Faq\Admin\UpdateFaqAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\CreateMenuRequest;
use App\Http\Requests\Faq\UpdateMenuRequest;
use App\Http\Resources\FaqResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FaqController extends Controller
{
    public function __construct(
        protected FindFaqByIdAction $findFaqByIdAction,
        protected UpdateFaqAction   $updateFaqAction,
        protected CreateFaqAction   $createFaqAction,
        protected DeleteFaqAction   $deleteFaqAction,
        protected GetFaqsAction     $getFaqsAction
    )
    {
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Faq/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Faq/Modify');
    }

    public function store(CreateMenuRequest $request): RedirectResponse
    {
        $this->createFaqAction->run($request->validated());
        return redirect()->route('admin.faq.index');
    }

    public function edit(int $id): Response
    {
        $faq = $this->findFaqByIdAction->run($id);

        return Inertia::render('Admin/Faq/Modify', [
            'faq' => new FaqResource($faq),
        ]);
    }

    public function update(UpdateMenuRequest $request, int $id): RedirectResponse
    {
        $this->updateFaqAction->run($request->validated(), $id);
        return redirect()->route('admin.faq.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteFaqAction->run($id);
        return back();
    }
}
