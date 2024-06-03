<?php

namespace App\Http\Controllers\API;

use App\Actions\Categories\Admin\GetPaginatedCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function __construct(
        protected GetPaginatedCategoriesAction $getPaginatedCategoriesAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $categories = $this->getPaginatedCategoriesAction->run($request->all());
        return CategoryResource::collection($categories);
    }
}
