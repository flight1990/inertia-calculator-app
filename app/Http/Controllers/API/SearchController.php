<?php

namespace App\Http\Controllers\API;

use App\Actions\Calculators\Guest\SearchCalculatorsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function __construct(
        protected SearchCalculatorsAction $searchCalculatorsAction
    )
    {
    }

    public function search(Request $request): Collection
    {
        return $this->searchCalculatorsAction->run($request->get('search'));
    }
}
