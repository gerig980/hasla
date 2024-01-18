<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $product_stock = ProductStock::where('product_id', $this->id)->get();
        $color_by_variants = [];
        foreach($product_stock as $keyStock => $variant)
        {
            $colorSize = explode("-", $variant->variant_ids);
            $colorValues = Color::where('id', $colorSize[0])->get();
            foreach($colorValues as $key => $colorValue){
                 $color_by_variants[$keyStock] = [
                'color_id'  => $colorValue->id,
                'color_name'    => $colorValue->name,
                'color_code'    => $colorValue->code,
                'color_images'  => json_decode($variant->image),
                'sku'           => $variant->sku
            ]; 
            }
            
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image,
            'products' => ProductResource::collection(Product::where('collection_id', $this->id)->get()),
            // 'product_stock' => $color_by_variants
        ];
    }
}
