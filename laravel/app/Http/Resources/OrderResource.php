<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'astrologist_id' => $this->astrologist_id,
            'service_id' => $this->service_id,
            'price' => $this->price,
            'email' => $this->email,
            'created_at' => $this->created_at,
        ];
    }
}
