<?php

namespace App\Http\Controllers\Guest;

use App\Actions\Faq\Guest\GetFaqsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use Inertia\Inertia;
use Inertia\Response;

class FaqController extends Controller
{
    public function __construct(
        protected GetFaqsAction $getFaqsAction
    )
    {}

    public function index(): Response
    {
        $faqs = $this->getFaqsAction->run();

        return Inertia::render('Guest/Faq', [
            'faqs' => FaqResource::collection($faqs)
        ]);
    }
}
