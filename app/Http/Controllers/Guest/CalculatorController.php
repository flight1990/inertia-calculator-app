<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use App\Http\Resources\CategoryResource;
use App\Models\Calculator;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function show(string $slug): Response
    {
        $calculator = Calculator::query()
            ->where('slug', $slug)
            ->withCount(['favoriteUsers' => function($q) {
                $q->where('user_id', Auth::id());
            }])
            ->firstOrFail();

        $category = Category::query()
            ->with('calculators', function ($q) use ($calculator) {
                $q->where('id', '!=', $calculator['id']);
            })
            ->findOrFail($calculator['category_id']);

        return Inertia::render('Guest/Calculator', [
            'calculator' => new CalculatorResource($calculator),
            'category' => new CategoryResource($category)
        ]);
    }
}
