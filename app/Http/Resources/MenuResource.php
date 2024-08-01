<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'title' => $this->whenHas('title'),
            'url' => $this->whenHas('url'),
            'parent_id' => $this->whenHas('parent_id'),
            'children' => $this->whenLoaded('children')
        ];
    }
}
