<?php

namespace App\Http\Controllers\API;

use App\Actions\Calculators\Admin\GetCalculatorsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CalculatorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalculatorController extends Controller
{
    public function __construct(
        protected GetCalculatorsAction $getCalculatorsAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $calculators = $this->getCalculatorsAction->run($request->all());
        return CalculatorResource::collection($calculators);
    }
}
