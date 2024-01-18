<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            "id" => $row['id'],
            "added_by" => $row['added_by'] ?? 0,
            "category_id" => $row['category_id'], 
            "size_guide_id" => $row['size_guide_id'] ?? 0,
            "collection_id" => $row['collection_id'], 
            "filter_attribute_id" => $row['filter_attribute_id'], 	
            "up_sell_product_ids" => $row['up_sell_product_ids'],
            "name" => $row['name'],
            "slug" => $row['slug'], 
            "sku" => $row['sku'], 
            "images" => $row['images'],
            "image_ids" => $row['image_ids'],
            "thumbnail" => $row['thumbnail'], 
            "thumbnail_id" => $row['thumbnail_id'],
            "video_provider"=> $row['video_provider'] ,
            "video_url" => $row['video_url'],
            "colors" => $row['colors'],
            "attribute_sets" => $row['attribute_sets'],
            "unit" => $row['unit'],
            "has_variant" => $row['has_variant'], 
            "selected_variants" => $row['selected_variants'], 
            "selected_variants_ids" => $row['selected_variants_ids'],
            "description" => $row['description'],
            "price" => $row['price'],
            "current_stock" => $row['current_stock'],
            "minimum_order_quantity" => $row['minimum_order_quantity'],
            "stock_notification" => $row['stock_notification'],
            "low_stock_to_notify" => $row['low_stock_to_notify'], 
            "stock_visibility" => $row['stock_visibility'],
            "total_sale" => $row['total_sale'] ?? 0,
            "special_discount" => $row['special_discount'],
            "special_discount_type" => $row['special_discount_type'],
            "special_discount_start" => $row['special_discount_start'],
            "special_discount_end" => $row['special_discount_end'],
            "status" => $row['status'],
            "is_featured" => $row['is_featured'] ?? 0,
            "is_refundable" => $row['is_refundable'] ?? 0,
            "todays_deal" => $row['todays_deal'] ?? 0, 
            "rating" => $row['rating'] ?? 0,
            "product_status" => $row['product_status'],
            "allow_checkout_when_out_of_stock" => $row['allow_checkout_when_out_of_stock'] ?? 0,
            "with_storehouse_management" => $row['with_storehouse_management'] ?? 0,
            "free_shipping" => $row['free_shipping'] ?? 0,
            "length" => $row['length'], 
            "wide" => $row['wide'], 
            "height" => $row['height'],
            "weight" => $row['weight'],
            "barcode" => $row['barcode'],
            "tax_id" => $row['tax_id'],
            "vat_taxes" => $row['vat_taxes'],
            "num_of_sale" => $row['num_of_sale'], 
            "viewed" => $row['viewed'] ?? 0, 
            "tags" => $row['tags'],
            "meta_title" => $row['meta_title'], 
            "meta_description" => $row['meta_description'],
            "meta_keywords" => $row['meta_keywords'] ,
            "created_at" => $row['created_at'],
            "updated_at" => $row['updated_at']
        ]);
    }
}
