<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProduct implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array

    {

        return ["id", "added_by", "category_id", "size_guide_id" ,"collection_id", "filter_attribute_id", 	"up_sell_product_ids", 	"name" ,"slug", "sku", 	"images", "image_ids" ,"thumbnail", "thumbnail_id" ,"video_provider" ,"video_url","colors","attribute_sets", "unit","has_variant", 	"selected_variants", "selected_variants_ids", "description", "price" ,"current_stock", 	"minimum_order_quantity", "stock_notification", "low_stock_to_notify", "stock_visibility", "total_sale", "special_discount", "special_discount_type", "special_discount_start", "special_discount_end", "status", "is_featured", "is_refundable", "todays_deal", "rating" ,"product_status", "allow_checkout_when_out_of_stock","with_storehouse_management", "free_shipping", "length", "wide", "height" ,"weight" ,"barcode", "tax_id", "vat_taxes", "num_of_sale", "viewed", "tags" ,"meta_title", "meta_description" ,"meta_keywords" ,"created_at" ,"updated_at" ];

    }
}
