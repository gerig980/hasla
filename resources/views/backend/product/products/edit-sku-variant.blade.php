<table class="table table-striped table-bordered product-variant-table">
    <thead>
    <tr>
        <td scope="col">{{ __('Variant') }}</td>
        <td scope="col">{{ __('Cmimi') }} *</td>
        <td scope="col">{{ __('SKU') }} *</td>
        <td scope="col">{{ __('Stoku Aktual') }} *</td>
        <td scope="col">{{ __('Imazhi') }}</td>
        <td>{{ __('Action') }}</td>
    </tr>
    </thead>
    <tbody>
    @foreach($product->stock as $i => $s_p)
        <tr>
            <th scope="row" width="18%"><label
                        class="font-normal">{{ @old('variant_name', $s_p->name) }}</label><input
                        type="hidden" lang="en"
                        name="variant_name[{{$i}}]"
                        value="{{ @old('variant_name', $s_p->name) }}"
                        class="form-control">
                <input type="hidden" lang="en" name="variant_ids[{{$i}}]" value="{{ @old('variant_ids', $s_p->variant_ids) }}" class="form-control">
            </th>
            <td width="18%"><input type="number" lang="en"
                                   name="variant_price[{{$i}}]"
                                   value="{{ @old('variant_price', $s_p->price) }}"
                                   min="0" step="any"
                                   class="form-control"></td>
            <td width="18%">
                <input type="text" name="variant_sku[{{$i}}]"
                       value="{{ @old('variant_sku', $s_p->sku) }}"
                       class="form-control">
                @if ($errors->has('variant_sku.'.$i))
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('variant_sku.'.$i) }}</p>
                    </div>
                @endif

            </td>
            <td width="18%"><input type="number"
                                   name="variant_stock[{{$i}}]"
                                   value="{{ @old('variant_stock', $s_p->current_stock) }}"
                                   min="0" step="1"
                                   class="form-control"></td>
            <td>
                <div>
                    <div class="form-group">
                        <div class="input-group gallery-modal"
                             id="btnSubmit" data-for="image"
                             data-variant="1"
                             data-selection="single"
                             data-target="#galleryModal"
                             data-dismiss="modal">
                            <input type="hidden"
                                   name="variant_image[{{$i}}]"
                                   value="{{ @old('variant_image')[$i] }}"
                                   class="image-selected">
                            <span class="form-control"><span
                                        class="counter">0</span> {{ __('file') }}</span>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ __('Choose') }}
                                </div>
                            </div>
                        </div>
                        <div class="selected-media-box">
                            <div class="mt-2 gallery gallery-md d-flex">
                                @if(@old('variant_image')[$i])
                                    <div class="selected-media mr-2 mb-2 mt-3 ml-0"
                                         data-id="{{ @old('variant_image')[$i] }}">
                                        @php
                                            $media = \App\Models\Media::find(@old('variant_image')[$i]);
                                        @endphp
                                        @if($media && @is_file_exists($media->image_variants['image_72x72'], $media->image_variants['storage']))
                                            <img
                                                    src="{{ get_media($media->image_variants['image_72x72'], $media->image_variants['storage']) }}"
                                                    alt="img-thumbnail"
                                                    class="img-thumbnail logo-profile">
                                        @else
                                            <img
                                                    src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                    alt="img-thumbnail"
                                                    class="img-thumbnail logo-profile">
                                        @endif
                                        <div class="image-remove">
                                            <a href="javascript:void(0)"
                                               class="remove"><i
                                                        class="bx bx-x"></i></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td width="6%">
                <button type="button"
                        class="btn btn-icon btn-sm btn-danger remove-menu-row"
                        onclick="$(this).closest('tr').remove();">
                    <i class="bx bx-trash"></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>