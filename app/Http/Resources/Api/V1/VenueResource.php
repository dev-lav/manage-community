<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VenueResource extends JsonResource
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
            'name' => $this->name,
            'location' => $this->location,
            'capacity' => $this->capacity,
            'pic_name' => $this->pic_name,
            'pic_phone' => $this->pic_phone,
            'pic_email' => $this->pic_email,
        ];
    }
}
