<?php

namespace App\Http\Controllers\API;

use App\Actions\Faq\Admin\GetFaqsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FaqController extends Controller
{
    public function __construct(
        protected GetFaqsAction $getFaqsAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $faqs = $this->getFaqsAction->run($request->all());
        return FaqResource::collection($faqs);
    }
}
