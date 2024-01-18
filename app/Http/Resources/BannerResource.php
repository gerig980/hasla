<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'order'         => $this->order,
            'category_id'   => $this->category_id,
            'image'         => $this->image,
            'link'          => $this->link,
            'banner_type'   => $this->banner_type,
            'status'        => $this->status,
        ];
    }
}
