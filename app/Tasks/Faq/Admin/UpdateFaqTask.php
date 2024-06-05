<?php

namespace App\Tasks\Faq\Admin;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;

class UpdateFaqTask
{
    public function run(array $payload, int $id): Model
    {
        $faq = Faq::query()->findOrFail($id);
        $faq->update($payload);

        return $faq;
    }
}
