<?php

namespace App\Tasks\Categories\Guest;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class FindCategoryTask
{
    public function run(int $categoryId, ?int $calculatorId = null): Model
    {
        return Category::query()
            ->with('calculators')
            ->findOrFail($categoryId);

        // return Category::query()
        //     ->with('calculators', function ($q) use ($calculatorId) {
        //         $q->when(!empty($calculatorId), function ($q) use ($calculatorId) {
        //             $q->where('id', '!=', $calculatorId);
        //         });
        //     })
        //     ->findOrFail($categoryId);
    }
}
