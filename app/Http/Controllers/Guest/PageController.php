<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Categories\GetGuestCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function __construct(
        protected GetGuestCategoriesAction $getGuestCategoriesAction
    )
    {
    }

    public function index(): Response
    {
        $categories = $this->getGuestCategoriesAction->run();

        return Inertia::render('Guest/Index', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }
}
