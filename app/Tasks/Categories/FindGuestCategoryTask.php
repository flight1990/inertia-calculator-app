<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class FindGuestCategoryTask
{
    public function run(int $categoryId, ?int $calculatorId = null): Model
    {
        return Category::query()
            ->with('calculators', function ($q) use ($calculatorId) {
                $q->when(!empty($calculatorId), function ($q) use ($calculatorId) {
                    $q->where('id', '!=', $calculatorId);
                });
            })
            ->findOrFail($categoryId);
    }
}
