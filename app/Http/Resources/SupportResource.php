<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $statusLabel = $this->statusOptions[$this->status] ?? 'Not Found Status';

        return [
            'id' => $this->id,
            'status' => $this->status,
            'status_label' => $statusLabel,
            'description' => $this->description,
            'user' => new UserResource($this->whenLoaded('user')),
            'lesson' => LessonResource::collection($this->whenLoaded('lessons')),
            'replies' => LessonResource::collection($this->whenLoaded('replies')),
            'dt_updated' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s')
        ];
    }
}
