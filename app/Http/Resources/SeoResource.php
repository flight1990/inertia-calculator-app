<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'url' => $this->whenHas('url'),
            'h1' => $this->whenHas('h1'),
            'title' => $this->whenHas('title'),
            'description' => $this->whenHas('description'),
            'keywords' => $this->whenHas('keywords'),
            'robots' => $this->whenHas('robots'),
            'no_index' => $this->whenHas('no_index'),
            'no_follow' => $this->whenHas('no_follow'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
        ];
    }
}
