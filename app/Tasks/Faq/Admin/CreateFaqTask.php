<?php

namespace App\Tasks\Faq\Admin;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;

class CreateFaqTask
{
    public function run(array $paload): Model
    {
        return Faq::create($paload);
    }
}
