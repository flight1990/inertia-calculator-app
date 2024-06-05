<?php

namespace App\Tasks\Faq\Admin;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;

class FindFaqByIdTask
{
    public function run(int $id): Model
    {
        return Faq::query()->findOrFail($id);
    }
}
