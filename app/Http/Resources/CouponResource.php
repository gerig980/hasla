<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'title' => $this->title,
            'code' => $this->code,
            'banner' => $this->banner,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
