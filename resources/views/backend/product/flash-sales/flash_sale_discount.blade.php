@if (count($product_ids) > 0)
    <div class="col-sm-12">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td class="" width="40%">
                        <label class="control-label">{{ __('Produkti') }}</label>
                    </td>
                    <td class="text-center">
                        <label class="control-label">{{ __('Zbritja') }}</label>
                    </td>
                    <td class="text-center" width="15%">
                        <label class="control-label">{{ __('Tipi i Zbritjes') }}</label>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_ids as $key => $id)
                    @php
                    if(strpos($id, "-") !== false){
                        $product_explode_ids = explode("-", $id);
                        $product_id  = (int)$product_explode_ids[0];
                        $variant_id  = (int)end($product_explode_ids);
                    }else{
                        $product_id = $id;
                        $variant_id = 0;
                    }
                        $product = \App\Models\Product::findOrFail($product_id);
                    @endphp
                    <?php $product_image_path ="images/admin_products/small/".$product->thumbnail; ?>
                    <tr>
                        <td>
                            <div class="from-group row gutters-5">
                                <div class="col-auto">
                                    @if(!empty($product->thumbnail) && file_exists($product_image_path))
                                        <img style="width: 40px;" src="{{ asset('/images/admin_products/small/'.$product->thumbnail) }}" alt="{{$product->name}}">
                                    
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="">{{ $product->name }}</div>
                                    <input type="hidden" name="variant_id_{{ $product_id }}_{{ $variant_id }}"
                                        value="{{ $variant_id  }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" step="0.01" name="discount_{{ $product_id }}_{{ $variant_id }}"
                                value="{{ $product->discount }}" min="0"
                                class="form-control" required>
                        </td>
                        <td>
                            <select class="js-example-basic-single form-control select2" name="discount_type_{{ $product_id }}_{{ $variant_id }}">
                                <option value="flat">{{ __('Flat') }}</option>
                                <option value="percent">{{ __('Percent') }}</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
