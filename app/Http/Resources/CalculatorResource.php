<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CalculatorResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'name' => $this->whenHas('name'),
            'slug' => $this->whenHas('slug'),
            'uuid' => $this->whenHas('uuid'),
            'script' => $this->whenHas('frontend_path', !empty($this['frontend_path']) ? Storage::disk('public')->url($this['frontend_path']) : null),
            'description' => $this->whenHas('description'),
            'category_id' => $this->whenHas('category_id'),
            'created_at' => $this->whenHas('created_at'),
            'updated_at' => $this->whenHas('updated_at'),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'saved_calculations' => SavedCalculatorResource::collection($this->whenLoaded('savedUsers')),
            'is_favorite' => $this['favorite_users_count'] > 0
        ];
    }
}
