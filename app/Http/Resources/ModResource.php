<?php

namespace App\Http\Resources;
use Carbon\Carbon;

use Illuminate\Http\Resources\Json\JsonResource;

class ModResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->load('user'); // Eager load the user relationship

        return [
            'id' => $this->resource->id,
            'user_id' => new UserResource($this->resource->user), // Use UserResource for user_id
            'name' => $this->resource->name,
            'path' => $this->resource->path,
            'created_at' => Carbon::parse($this->resource->created_at)->toDateTimeString(),
        ];
    }
}
