<?php

namespace App\Http\Controllers\API;

use App\Actions\Seo\Admin\GetSeoAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SeoController extends Controller
{
    public function __construct(
        protected GetSeoAction $getSeoAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $seo = $this->getSeoAction->run($request->all());
        return SeoResource::collection($seo);
    }
}
