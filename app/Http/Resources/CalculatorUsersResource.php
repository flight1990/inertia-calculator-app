<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CalculatorUsersResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this['pivot']['id'],
            'name' => $this['pivot']['name'],
            'input' => $this['pivot']['input'],
        ];
    }
}
