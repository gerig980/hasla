<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FlashSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $enddate = Carbon::parse($this->end_date)->format('Y-m-d H:i:s');
        $dateNow = Carbon::now()->timezone('Europe/Tirane')->format('Y-m-d H:i:s');
        
        $categories = [];
        foreach($this->flashSaleProducts as $key => $product) {
            $categories[$key] = [
                'id' => $product->product->category->id,
                'parent_id' => $product->product->category->parent_id,
                'name' => $product->product->category->name,
            ];
        }
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'start_date' => $this->start_date,
            'end_date' => $enddate,
            'created_at' => $this->created_at,
            'date_now' => $dateNow,
            'products_id' => FlashSaleProductResource::collection($this->whenLoaded('flashSaleProducts')),
            'categories' => collect($categories)->unique()
        ];
    }
}