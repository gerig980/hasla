<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\ProductStock;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $filter_attribute_ids = array_map('intval', explode(",", $this->filter_attribute_id));
        $sizes_array = array_map('intval', $this->selected_variants_ids);
        $colors_array = array_map('intval', $this->colors);
        $tags = collect(explode(",", $this->tags));

        $product_stock = ProductStock::where('product_id', $this->id)->get();

        $color_by_variants = [];
        foreach($product_stock as $keyStock => $variant)
        {
            if(strpos($variant->variant_ids, "-") !== false){
                $colorSize = explode("-", $variant->variant_ids);
                $color_id = $colorSize[0];
            }else{
                $color_id = $variant->variant_ids;
            }
            $colorValue = Color::where('id', $color_id)->first();
            
            $color_by_variants[$keyStock] = [
                'color_id'      => $colorValue->id,
                'color_name'    => $colorValue->name,
                'color_code'    => $colorValue->code,
                'color_images'  => json_decode($variant->image),
            ];
        }
        $apiVariants = collect($color_by_variants)->unique('color_id')->toArray();
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'category_id'               => $this->category_id,
            'filter_attribute_id'       => $filter_attribute_ids,
            // 'size_guide_id'          => $this->size_guide_id,
            // 'collection_id'          => $this->collection_id,
            'slug'                      => $this->slug,
            'sku'                       => $this->sku,
            'images'                    => $this->images,
            // 'image_ids'              => $this->image_ids,
            'thumbnail'                 => trim($this->thumbnail, '"'),
            'thumbnail_id'              => $this->thumbnail_id,
            // 'video_provider'         => $this->video_provider,
            // 'video_url'              => $this->video_url,
            'colors_attributes'         => $colors_array,
            'colors'                    => ColorResource::collection(Color::whereIn('id', $this->colors)->get()),
            'attribute_sets'            => $this->attribute_sets,
            'has_variant'               => $this->has_variant,
            // 'selected_variants'      => $this->selected_variants,
            'selected_variants_ids'     => $sizes_array,
            // 'description'            => $this->description,
            'price'                     => (double) $this->price,
            'total_sale'                => $this->total_sale,
            'current_stock'             => $this->current_stock,
            // 'stock_visibility'       => $this->stock_visibility,
            'special_discount'          => $this->special_discount,
            'special_discount_type'     => $this->special_discount_type,
            'special_discount_start'    => $this->special_discount_start,
            'special_discount_end'      => $this->special_discount_end,
            'is_featured'               => $this->is_featured,
            'todays_deal'               => $this->todays_deal,
            'category'                  => new CategoryResource($this->category),
            'thumbnail_path'            => '/images/admin_products/small/',
            'stocks_path'               => '/images/admin_variant_images/',
            'product_stocks'            => $apiVariants,
            'quantity'                  => 1,
            'tags'                      => $tags
        ];
    }
}