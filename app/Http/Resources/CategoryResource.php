<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'icon' => $this->whenHas('icon'),
            'slug' => $this->whenHas('slug'),
            'seo_title' => $this->whenHas('seo_title'),
            'seo_description' => $this->whenHas('seo_description'),
            'seo_keywords' => $this->whenHas('seo_keywords'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'calculators' => CalculatorResource::collection($this->whenLoaded('calculators'))
        ];
    }
}
