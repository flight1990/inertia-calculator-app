<?php

namespace App\Http\Controllers\API;

use App\Actions\Categories\Admin\GetCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function __construct(
        protected GetCategoriesAction $getAdminCategoriesAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $categories = $this->getAdminCategoriesAction->run($request->all());
        return CategoryResource::collection($categories);
    }
}
