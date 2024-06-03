<?php

namespace App\Tasks\Faq\Admin;

use App\Models\Faq;

class DeleteFaqTask
{
    public function run(int $id): void
    {
        $faq = Faq::query()->findOrFail($id);
        $faq->delete();
    }
}
