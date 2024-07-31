<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoGuestResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'h1' => $this['h1'] ?? 'default h1',
            'title' => $this['title'] ?? 'default title',
            'description' => $this['description'] ?? 'default description',
            'keywords' => $this['keywords'] ?? 'default keywords',
            'index' => $this['index'] ?? false,
            'follow' => $this['follow'] ?? false,
        ];
    }
}
