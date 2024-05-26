<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalculatorResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'description' => $this->whenHas('description'),
            'category_id' => $this->whenHas('category_id'),
            'seo_title' => $this->whenHas('seo_title'),
            'seo_description' => $this->whenHas('seo_description'),
            'seo_keywords' => $this->whenHas('seo_keywords'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'is_favorite' => $this['favorite_users_count'] > 0
        ];
    }
}
