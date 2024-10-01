<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'type' => $this->type,
            'title' => $this->title,
            'text' => $this->text,  
            'series' => $this->series,
            'categories' => $this->categories,
            'real_time' => $this->real_time,
            'data_insight_id' =>$this->data_insight_id
        ];
    }
}
