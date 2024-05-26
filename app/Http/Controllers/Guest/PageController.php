<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function index(): Response
    {
        $categories = Category::query()
            ->with(['calculators'])
            ->get();

        return Inertia::render('Guest/Index', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }
}
