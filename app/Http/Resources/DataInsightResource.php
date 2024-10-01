<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataInsightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
             
             'technologies' => TechnologyResource::collection($this->technologies), // إذا كان لديك علاقة بالـ Technology
             'charts' => ChartResource::collection($this->charts), // إذا كان لديك علاقة بالـ Chart

        ];
    }
}
