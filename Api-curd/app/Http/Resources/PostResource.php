<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'content'   => $this->content,
            'created_at'=> $this->created_at?->toISOString(),
            'updated_at'=> $this->updated_at?->toISOString(),
            // Extras (optional):
            'excerpt'   => str($this->content)->limit(80)->toString(),
        ];
    }

    /**
     * Extra top-level data (optional).
     */
    public function with(Request $request): array
    {
        return [
            'success' => true,
        ];
    }
}

