<!-- product's variations modal on pos -->
<div id="fadeInleftModal{{ $product->id }}" class="modal fade fadeInLeft" tabindex="-1" aria-labelledby="fadeInleftModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fadeInleftModalLabel">T-shirt Unisex</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($product->productStocks as $product_stock)
                        <div class="col-6 col-md-3">
                            <div class="card">
                                @if (!empty(json_decode($product_stock->image)))
                                    @foreach (json_decode($product_stock->image) as $key => $img)
                                        @php
                                            $firstImg = $img;
                                            break;
                                        @endphp
                                    @endforeach
                                @else
                                    @php $firstImg = 'thumbnailKF.png' @endphp
                                @endif
                                <img class="card-img-top img-fluid product-image-{{ $product_stock->id }}" product-image="{{ $firstImg }}" src="{{ URL::asset('images/admin_variant_images/'.$firstImg) }}" alt="{{ $product_stock->name }}">
                                <div class="card-body">
                                    <h4 class="card-title product-name-{{ $product_stock->id }}" product-name="{{ $product_stock->name }}">{{ $product_stock->name }}</h4>
                                    @php
                                    $discount_amount = \App\Models\Product::getDiscountPrice($product->id);
                                    $flash_sale_discount_amount = \App\Models\FlashSale::getFlashSaleDiscount($product->id, $product_stock->id);

                                    if($flash_sale_discount_amount != 0)
                                    {
                                        $final_price = $flash_sale_discount_amount;
                                    }
                                    elseif($discount_amount != 0)
                                    {
                                        $final_price = $discount_amount;
                                    }else
                                    {
                                        $final_price = $product_stock->price;
                                    }
                                    @endphp
                                        <p class="card-text product-price-{{ $product_stock->id }}" product-price="{{ $final_price }}">{{ $final_price }} ALL</p>

                                        @php
                                            if(strpos($product_stock->variant_ids, "-") !== false){
                                                $expl_ids   = explode('-',$product_stock->variant_ids);
                                                $color_id   = (int)$expl_ids[0];
                                                $variant_id = (int)end($expl_ids);
                                                $color      = \App\Models\Color::where('id',$color_id)->first();
                                                $variant    = \App\Models\AttributeValue::where('id',$variant_id)->first();
                                        @endphp
                                            <span class="badge bg-dark product-color-{{ $product_stock->id }}" product-color="{{ $color_id }}" p-color-name="{{ $color->name }}">{{ $color->name }} </span>
                                            <span class="badge bg-dark product-variant-{{ $product_stock->id }}" product-variant="{{ $variant_id }}" p-variant-name="{{ $variant->value }}">{{ $variant->value }} </span>
                                        @php 
                                            }else{
                                                $expl_ids   = explode('-',$product_stock->variant_ids);
                                                $color_id   = (int)$expl_ids[0];
                                                $color      = \App\Models\Color::where('id',$color_id)->first();
                                        @endphp
                                        <span class="badge bg-dark product-color-{{ $product_stock->id }}" product-color="{{ $color_id }}" p-color-name="{{ $color->name }}">{{ $color->name }} </span>
                                        @php
                                            } 
                                        @endphp
                                        
                                        <span class="text-muted fs-12">(Sasia {{ $product_stock->current_stock }})</span>
                                    <div class="d-grid gap-2 pt-2"> 
                                        <button variation-product-id="{{ $product_stock->id }}" product_id="{{ $product->id }}"
                                            class="btn btn-sm btn-soft-danger waves-effect waves-light add-btn-variation" type="button" >
                                            Shto Produkt<i class="ri-shopping-bag-line label-icon align-middle rounded-pill fs-16 ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    @endforeach
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->