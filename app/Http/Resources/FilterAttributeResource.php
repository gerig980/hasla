<?php

namespace App\Http\Resources;

use App\Models\FilterAttributeValue;
use Illuminate\Http\Resources\Json\JsonResource;

class FilterAttributeResource extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->name,
            'filterAttributeValues' => new FilterAttributeValueResource($this->filterAttributeValue)
        ];
    }
}
