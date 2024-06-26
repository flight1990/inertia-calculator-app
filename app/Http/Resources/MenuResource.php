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
            'id' => $this->resource->id,
            'name' => $this->resource->title,
            'url' => $this->resource->url(),
            'isActive' => $this->resource->isActive,
            'nickname' => $this->resource->nickname,
            'icon' => $this->resource->attributes['icon'],
            'disableActivationByURL' => $this->resource->disableActivationByURL,
            'children' => MenuResource::collection($this->resource->children()),
            'parent' => $this->resource->parent,
        ];
    }
}
