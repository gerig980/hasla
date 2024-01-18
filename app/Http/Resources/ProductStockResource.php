<?php

namespace App\Http\Resources;

use App\Models\Color;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductStockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $colorSize = explode("-", $this->variant_ids);
        $color[] = $colorSize[0];

        
        return [
            "id"                => $this->id,
            "color"             => ColorResource::collection(Color::whereIn('id', $color)->get()),
            "image_color"       => json_decode($this->image)[0],
            "image"             => json_decode($this->image),
            "image_path"        => '/images/admin_variant_images/'
        ];
    }
}
