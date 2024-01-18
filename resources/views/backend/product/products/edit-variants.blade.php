<table class="table table-striped table-bordered product-variant-table">
    @if(isset($variants))
        <thead>
        <tr>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td></td>
        </tr>
        </thead>
        <tbody>

        @foreach ($variants_data as $index => $variant)
            @php
                $variant_name = '';
                $variant_ids = '';
                $productColors = \App\Models\Product::where('id', $product_id)->first();
                // dump($productColors->colors);
                if(!(in_array($variant[0], $productColors->colors)) || ((in_array($variant[0], $productColors->colors)) && !(in_array($variant[1], $productColors->selected_variants_ids)))) 
                {
                    foreach ($variant as $key => $item){
                        if($key > 0 ){
                            $attribute_value = \App\Models\AttributeValue::find($item);
                            $variant_name .= '-'.str_replace(' ', '', $attribute_value->value);
                            $variant_ids .= '-'.str_replace(' ', '', $attribute_value->id);
                        }
                        else{
                            if($colors == 1){
                                $color_all = \App\Models\Color::where('id', $item)->get();
                                foreach ($color_all as $color){
                                    $color_name = $color->name;
                                    $color_id = $color->id;
                                    continue;
                                }
                                $variant_name .= $color_name;
                                $variant_ids .= $item;
                            }
                            else{
                                $attribute_value = \App\Models\AttributeValue::find($item);
                                $variant_name .= str_replace(' ', '', $attribute_value->value);
                                $variant_ids .= str_replace(' ', '', $attribute_value->id);
                            }
                        }
                    }
                } 
                
            @endphp
            @if(strlen($variant_name) > 0)
                <tr>
                    <th scope="row" width="18%"><label class="font-normal">{{ $variant_name }}</label><input type="hidden"  name="variant_name[]" value="{{ $variant_name }}" class="form-control">
                        <input type="hidden" name="variant_ids[]" value="{{ $variant_ids }}" class="form-control">
                    </th>
                    <td width="18%"><input type="number"  name="variant_price[]" value="" min="0" step="any" class="form-control"></td>
                    <td width="18%">
                        <input type="text" name="variant_sku[]" value="{{ $variant_name }}" class="form-control">
                        @if ($errors->has('variant_sku.'.$index))
                            <div class="invalid-feedback">
                                <p>{{ $errors->first('variant_sku.'.$index) }}</p>
                            </div>
                        @endif
                    </td>
                    <td width="18%"><input type="number"  name="variant_stock[]" value="" min="0" step="1" class="form-control"></td>
                    <td width="22%">
                        <div>
                            <div class="form-group">
                            {{-- <div class="input-group gallery-modal" id="btnSubmit"  data-for="image" data-variant="1" data-selection="single"
                                 data-target="#galleryModal" data-dismiss="modal">
                                <input type="hidden" name="variant_image[]" value="" class="image-selected">
                                <span class="form-control"><span class="counter">0</span> {{ __('file') }}</span>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        {{ __('Zgjidh') }}
                                    </div>
                                </div>
                            </div> --}}
                            <!--<input type="hidden" name="variant_image[]" value="" class="image-selected">-->
                                <div class="mb-4">
                                    <div class="input-group">
                                        <input type="file" name="variant_image[{{$variant_ids}}][]" class="form-control" id="inputGroupFile03" accept="image/*" aria-describedby="inputGroupFileAddon03" aria-label="Upload" multiple>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td width="6%"><button type="button" class="btn btn-icon btn-sm btn-danger remove-menu-row" onclick="$(this).closest('tr').remove();"><i class="bx bx-trash"></i></button></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    @endif
</table>
