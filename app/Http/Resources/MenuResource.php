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
            '_lft' => $this->whenHas('_lft'),
            '_rgt' => $this->whenHas('_rgt'),
            'parent_id' => $this->whenHas('parent_id'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'children' => $this->whenLoaded('children')
        ];
    }
}
