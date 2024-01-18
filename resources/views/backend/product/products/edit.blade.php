@extends('layouts.backend.app')
@push('css')
    <!-- Plugins css -->
    <link href="{{URL::asset('backend/assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .rotateimg45 {
            -webkit-transform:rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .input-group-text{
            height: 42px;
        }
        .gutters-xs > .col, .gutters-xs > [class*="col-"] {
            padding-right: .25rem;
            padding-left: .25rem;
        }
        .colorinput {
            margin: 0;
            position: relative;
            cursor: pointer;
        }
        .colorinput-color {
            background-color: #fdfdff;
            border-color: #e4e6fc;
            border-width: 1px;
            border-style: solid;
            display: inline-block;
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 15px;
            color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
        }
        .colorinput-input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }
        .colorinput-input:checked ~ .colorinput-color::before {
            opacity: 1;
        }
        .colorinput-color::before {
            content: "";
            opacity: 0;
            position: absolute;
            top: .25rem;
            left: .25rem;
            height: 1.25rem;
            width: 1.25rem;
            transition: .3s opacity;
            background: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E") no-repeat center center/50% 50%;
        }
        .gutters-xs {
            margin-right: -.25rem;
            margin-left: -.25rem;
        }
        li.product-output{
            list-style:none;
        }
        li.product-output:hover{
            cursor: pointer;
            background: #eff2f7;

        }
        .product-output-ul{
            box-shadow: rgba(0, 0, 0, 0.2) 0px 8px 16px 0px;
            height: 185px;
            overflow-y: auto;
        }
        .thumbnail {
            border: 1px solid #d7d5d5;
            padding-top: 12px;
            margin: 9px 12px;
        }
        .gallery {
            position: relative;
        }
        .gallery #clear {
            position: absolute;
            top: -5px;
            right: -5px;
            z-index: 100;
            border: 1px solid #f3f3f9;
            border-radius: 50%;
            padding: 2px 9px;
            cursor: pointer;
            background: #f3f3f9;
            color: #7d7d7d;
        }
        .gallery #clear:hover {
            border: 1px solid #f00;
            color: #f00;
        }
    </style>
@endpush
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Krijo Produkt') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('app.product.index') }}">{{ __('Lista e Produkteve') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Krijo Produkt') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('app.product.update') }}" method="post" enctype="multipart/form-data"
          data-form="{{ route('app.get-variants') }}" id="variant">
        @csrf
        
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="row">
            <div class="col-lg-8">
                {{-- Product Information --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Informacione rreth Produktit') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">{{__('Emri i produktit')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name', $product->name) }}"
                                   id="product-title-input"
                                   placeholder="{{ __('Emri i produktit') }}"
                            >
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">{{ __('Kategoria') }}<span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single form-control" name="category" data-toggle="select2">
                                        @foreach($categories as $single_category)
                                            <option 
                                            {{ (int)old('category', $product->category->id) === $single_category->id ? 'selected' : '' }} value="{{ $single_category->id }}"> &#9654; {{ $single_category->name }}</option>
                                            @foreach($single_category->children as $child_first)
                                                @if(!empty($child_first))
                                                    <option 
                                                    {{ (int)old('category', $product->category->id) === $child_first->id ? 'selected' : '' }} value="{{ $child_first->id }}"> {{ $single_category->name }} &#9656; {{ $child_first->name }}</option>
                                                @endif
                                                @foreach($child_first->children as $child_second)
                                                    @if(!empty($child_second))
                                                        <option 
                                                        {{ (int)old('category', $product->category->id) === $child_second->id ? 'selected' : '' }} value="{{ $child_second->id }}"> {{ $single_category->name }} &#9656;&nbsp; {{ $child_first->name }} &#9656;&nbsp; {{ $child_second->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product-unit-input">{{__('Njësia')}}<span class="text-danger">*</span></label>
                                    <input type="text" name="unit" id="unit"
                                           value="{{ old('unit', $product->unit) }}"
                                           class="form-control @error('unit') is-invalid @enderror"
                                           placeholder="Njësia (e.g kg. pc. etj)"
                                    >
                                    @error('unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="minimum_order_quantity">{{ __('Min. Sasi Porosie') }}<span class="text-danger">*</span></label>
                                    <input type="number" name="minimum_order_quantity"
                                           id="minimum_order_quantity" class="form-control @error('minimum_order_quantity') is-invalid @enderror"
                                           value="{{ old('minimum_order_quantity', $product->minimum_order_quantity) }}"
                                           placeholder="{{ __('Vendosni min e sasisë së produktit') }}"
                                           min="1"
                                    >
                                    @error('minimum_order_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="barcode">{{ __('Barkodi') }}</label>
                                    <p class="text-muted">{{__('Gjeneroni barkod automatikisht duke klikuar butonin e refresh.')}}</p>
                                    <div class="input-group">
                                        <input type="text" name="barcode" id="barcode"
                                               value="{{ old('barcode', $product->barcode)  }}"
                                               class="form-control @error('barcode') is-invalid @enderror"
                                               placeholder="{{ __('Vendosni barkodin e produktit') }}"
                                        >
                                        <div class="input-group-append barcode">
                                            <div class="input-group-text">
                                                <i class="bx bx-refresh"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @error('barcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <label>Përshkrimi i Produktit</label>
                            <textarea name="description" id="ckeditor-classic" id="description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Product Thumbnail and Gallery --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{__('Imazhet e Produktit')}}</h5>
                    </div>
                    <div class="card-body">
                        <!-- <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="video_provider">{{ __('Video Provider') }}</label>
                                    <select class="form-control js-example-basic-single" name="video_provider" id="video_provider">
                                        <option value=""selected>{{ __('Përzgjidh video provider') }}</option>
                                        <option value="youtube" {{ old('video_provider') == 'youtube' ? 'selected' : '' }}>{{ __('Youtube') }}</option>
                                        <option value="mp4" {{ old('video_provider') == 'mp4' ? 'selected' : '' }}>{{ __('Mp4') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="video_url">{{ __('Video URL') }}</label>
                                    <input type="text" name="video_url" id="video_url"
                                           value="{{ old('video_url') != '' ? old('video_url') : '' }}"
                                           class="form-control" placeholder="https://"
                                    >
                                </div>
                            </div>
                        </div> -->
                        <div class="row mb-4">
                            <h5 class="fs-14 mb-1">{{__('Foto Produkti')}}<span class="text-danger">*</span></h5>
                            <p class="text-muted">{{__('Shto imazhin kryesore të produktit.')}}</p>
                            <div class="input-group">
                                <input type="file" name="thumbnail" value="{{ $product->thumbnail }}" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>
                            @if (!empty($product->thumbnail))
                            <div class="col-2 text-center thumbnail">
                                <img src="/images/admin_products/small/{{ trim($product->thumbnail, '"') }}" style="width: 100px;height:auto;">
                                <p class="text-muted">{{ trim($product->thumbnail, '"') }}</p>
                            </div> 
                            @endif
                            <p class="text-muted">{{__('Ky imazh është i dukshëm në të gjithë kutinë e produktit. Përdorni madhësine 400x400')}}</p>
                        </div>
                        <div>
                            <h5 class="fs-14 mb-1">{{__('Foto të tjera')}}</h5>
                            <p class="text-muted">{{__('Shto foto të tjera në galerinë e produktit.')}}</p>
                            <div class="input-group">
                                <input type="file" name="images[]" multiple class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>
                            @if (!empty($product->images))
                            <div class="row">
                                @foreach ($product->images as $image)
                                <div class="col-2 text-center thumbnail gallery">
                                    <a id="clear">x</a>
                                    <img src="/images/admin_products/small/{{ $image }}" style="width: 100px;height:auto;">
                                    <p class="text-muted">{{ $image }}</p>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <p class="text-muted">{{__('Këto imazhe janë të dukshme në galerinë e faqes së detajeve të produktit. Përdorni imazhe me përmasa 700x700 ose më të larta për cilësi më të mirë.')}}</p>
                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                <li class="mt-2" id="dropzone-preview-list">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Product Price and Stock --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{__('Cmimi i Produktit & Stoku')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">{{ __('Cmimi/Njësi') }}<span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price"
                                           value="{{ old('price', $product->price) }}"
                                           class="form-control"
                                           placeholder="0" min="0" step="any">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="special_discount_type">{{ __('Tipi i uljes') }}</label>
                                    <select class="form-control js-example-basic-single" name="special_discount_type" id="special_discount_type">
                                        <option value="">{{ __('Përzgjidh tipin') }}</option>
                                        <option 
                                            {{ old('special_discount_type', $product->special_discount_type) === 'flat' ? 'selected' : '' }} value="flat">{{ __('Flat') }}</option>
                                        <option 
                                            {{ old('special_discount_type', $product->special_discount_type) === 'percentage' ? 'selected' : '' }} value="percentage">{{ __('Percentage') }}</option>
                                    </select>
                                    @error('special_discount_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="special_discount">{{ __('Ulja e produktit') }}</label>
                                    <input type="number" name="special_discount" id="special_discount"
                                           step="any" min="0"
                                           value="{{ old('special_discount', $product->special_discount)  }}"
                                           class="form-control" placeholder="{{ __('Ulja e produktit') }}">
                                    @error('special_discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-name-input">Data e Fillimit - Ulja</label>
                                    <input type="date" 
                                            class="form-control @error('special_discount_start') is-invalid @enderror" 
                                            id="manufacturer-brand-input" 
                                            name="special_discount_start"
                                            value="@if(!empty($product->special_discount_start)){{ $product->special_discount_start->toDateString() }}@endif">
                                    @error('discount_start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="manufacturer-brand-input">Data e Mbarimit - Ulja</label>
                                    <input type="date" 
                                            class="form-control @error('special_discount_end') is-invalid @enderror" 
                                            id="manufacturer-brand-input" 
                                            name="special_discount_end"
                                            value="@if(!empty($product->special_discount_end)){{ $product->special_discount_end->toDateString() }}@endif">
                                    @error('discount_end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="vat_taxes">{{ __('Vat & Tax') }}</label>
                            <select class="form-control js-example-basic-single" name="vat_taxes[]" multiple id="vat_taxes">
                                @foreach(\App\Models\Tax::where('status', 1)->get() as $vat_tax)
                                    <option
                                        value="{{ $vat_tax->id }}" {{ old('vat_taxes') != '' ? (in_array($vat_tax->id,old('vat_taxes')) ? 'selected' : '') : ''}}>{{ $vat_tax->vat_tax }}
                                        ({{ $vat_tax->percentage .'%' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>  -->
                    </div>
                </div>
                {{-- Product Stock and variant --}}
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{__('Stoku i Produktit')}}</h4>

                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="file-input-showcode" class="form-label text-muted">{{ __("Ka Variant") }}</label>
                                <input value="1" name="has_variant"
                                       {{ old('has_variant', $product->has_variant) == 1 ? 'checked' : '' }}
                                       class="form-check-input code-switcher variant-product variant" type="checkbox" id="file-input-showcode" >
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="low_stock_to_notify">{{ __('Paralajmërimi për min stok') }}</label>
                                    <input type="number" name="low_stock_to_notify"
                                           value="{{ old('low_stock_to_notify', $product->low_stock_to_notify) }}"
                                           class="form-control"
                                           placeholder="{{ __('Vendos shumën e min stokut për të marrë njoftimin') }}">
                                    @error('low_stock_to_notify')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_visibility">{{ __('Shfaqja e Stokut') }}<span class="text-danger"> *</span></label>
                                    <select class="form-control js-example-basic-single" name="stock_visibility" id="stock_visibility">
                                        <option value="visible_with_quantity" {{ old('stock_visibility', $product->stock_visibility) == 'visible_with_quantity' ? 'selected' : ''}}>{{ __('Shfaqur me sasinë') }}</option>
                                        <option value="visible_with_text" {{ old('stock_visibility', $product->stock_visibility) == 'visible_with_text' ? 'selected' : '' }}>{{ __('Shfaqur me tekst') }}</option>
                                    </select>
                                    @error('stock_visibility')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="without-variant {{ old('has_variant', $product->has_variant) == 1 ? 'd-none' : '' }}">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sku">{{ __('SKU') }}</label>
                                        <div class="input-group">
                                            <input type="text" name="sku" id="sku"
                                                   value="{{ old('sku', $product->sku) }}" class="form-control"
                                                   placeholder="{{ __('Vendos sku e produktit') }}">
                                            <div class="input-group-append barcode">
                                                <div class="input-group-text">
                                                    <i class="bx bx-refresh"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted">{{__('Gjeneroni SKU automatikisht duke klikuar butonin e refresh.')}}</p>
                                        @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_stock">{{ __('Stoku Aktual') }}</label>
                                        <input type="number" class="form-control"
                                               name="current_stock"
                                               value="{{ old('current_stock', $product->current_stock) }}"
                                               id="current_stock"
                                               placeholder="{{ __('Vendos sasinë aktuale në gjendje') }}">
                                        @error('current_stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="with-variant {{ old('has_variant', $product->has_variant) == 1 ? '' : 'd-none' }}">
                            <div class="form-group mb-4">
                                <label class="form-label">{{ __('Ngjyrat') }}</label>
                                <p class="text-muted">{{__('Përzgjidh një ose disa ngjyra si variante të produktit.')}}</p>
                                <div class="row gutters-xs">
                                    @foreach($colors as $color)
                                        <div class="col-auto">
                                            <label class="colorinput" data-toggle="tooltip" title=""
                                                   data-original-title="{{ $color->name }}">
                                                <input name="colors[]" type="checkbox"
                                                       value="{{ $color->id }}"
                                                       {{old('colors', $product->colors) ? (in_array($color->id , old('colors', $product->colors)) ? 'checked' : '') : '' }}
                                                       data-url="{{ route('app.get-attribute-values') }}"
                                                       class="colorinput-input attribute-sets"/>
                                                <span class="colorinput-color" style="background-color: {{ $color->code }}"></span>
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('colors')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-md-3">
                                    <input type="text" class="form-control"
                                           value="{{ __('Vlerat e Attributeve') }}"
                                           disabled>
                                </div>
                                <div class="col-md-9">
                                    <select class="js-example-basic-multiple attribute-sets" data-url="{{ route('app.get-attribute-values') }}" name="attribute_sets[]" multiple="multiple">
                                        @foreach($attributes as $attribute)
                                            <option value="{{ $attribute->id }}" {{  old('attribute_sets', $product->attribute_sets) ? (in_array($attribute->id , old('attribute_sets', $product->attribute_sets)) ? 'selected' : '') : '' }}>{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-info">{{ __('Përzgjidhni atributet e këtij produkti për të shtuar vlerat përkatëse') }}</p>
                                </div>
                            </div>
                            <div class="attribute-values mb-4">
                                @php
                                    $selected_attributes = old('attribute_sets', $product->attribute_sets) ? old('attribute_sets', $product->attribute_sets) : '';
                                    $selected_attributes = $attributes->whereIn('id',$selected_attributes);
                                @endphp
                                @foreach($selected_attributes as $attribute)
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control"
                                                   value="{{ $attribute->name }}"
                                                   disabled>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control js-example-basic-multiple variant"
                                                    name="attribute_values_{{$attribute->id}}[]"
                                                    multiple>
                                                @foreach($attribute->attribute_value as $value)
                                                    <option value="{{ $value->id }}" {{  old('attribute_values_'.$attribute->id, $product->selected_variants_ids) ? (in_array($value->id, old('attribute_values_'.$attribute->id, $product->selected_variants_ids)) ? 'selected' : '') : '' }}>
                                                        {{ $value->value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                               @include('backend.product.products.edit-sku-variant')
                            </div>
                            <div class="form-group row variant-table">
                                
                                @if(session()->has('attributes'))
                                    @include('backend.product.products.edit-sku-variant')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Shipping Information --}}
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                    Informacione për Shipping
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                    Meta Data
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="stocks-input">Pesha</label>
                                            <div class="input-group has-validation mb-3">
                                                <input type="text" 
                                                        class="form-control @error('weight') is-invalid @enderror" 
                                                        id="product-price-input" 
                                                        name="weight" value="{{ old('weight', $product->weight) }}" 
                                                        aria-label="Price" 
                                                        aria-describedby="product-price-addon">
                                                <span class="input-group-text" id="product-price-addon">g</span>
                                                @error('weight')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Gjatësia</label>
                                            <div class="input-group has-validation mb-3">
                                                <input type="text" 
                                                        class="form-control @error('length') is-invalid @enderror" 
                                                        id="product-price-input" 
                                                        name="length" 
                                                        value="{{ old('length', $product->length) }}"  
                                                        aria-label="Price" 
                                                        aria-describedby="product-price-addon">
                                                <span class="input-group-text" id="product-price-addon">cm</span>
                                                @error('length')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Gjerësia</label>
                                            <div class="input-group mb-3">
                                                <input type="text" 
                                                    class="form-control @error('wide') is-invalid @enderror" 
                                                    id="product-discount-input" 
                                                    name="wide" 
                                                    value="{{ old('wide', $product->wide) }}" 
                                                    aria-label="discount" 
                                                    aria-describedby="product-discount-addon">
                                                <span class="input-group-text" id="product-discount-addon">cm</span>
                                                @error('wide')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="orders-input">Lartësia</label>
                                            <div class="input-group mb-3">
                                                <input type="text" 
                                                        class="form-control @error('height') is-invalid @enderror" 
                                                        id="product-discount-input" 
                                                        name="height" 
                                                        value="{{ old('height', $product->height) }}"  
                                                        aria-label="discount" 
                                                        aria-describedby="product-discount-addon">
                                                <span class="input-group-text" id="product-discount-addon">cm</span>
                                                @error('height')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                            <input type="text" 
                                                    class="form-control @error('meta_title') is-invalid @enderror" 
                                                    value="{{ old('meta_title', $product->meta_title) }}"  
                                                    id="meta-title-input">
                                            @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                            <input type="text" 
                                                    class="form-control @error('meta_keywords') is-invalid @enderror" 
                                                    name="meta_keywords" 
                                                    value="{{ old('meta_keywords', $product->meta_keywords) }}" 
                                                    id="meta-keywords-input">
                                            @error('meta_keywords')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                                <div>
                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta-description-input" name="meta_description" rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div><!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Up & Cross-selling Products</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-md-12">
                                <label>Produkte të Ngjashme</label>
                                <form autocomplete="off" action="#">
                                    <div class="dashboard_bar" style="width:100%;">
                                        <div class="input-group d-lg-inline-flex d-none">
                                            <input id="search" name="search" type="text" class="form-control autocomplete" placeholder="Kërko Produkt...">
                                        </div>
                                        <div id="tbody" class="autocomplete-list"></div>
                                    </div>
                                </form>
                                <div class="row" id="display-product"></div>
                                @error('same_product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (!empty($product->up_sell_product_ids))
                            @php
                                $up_sell_ids = explode(',', $product->up_sell_product_ids);
                            @endphp
                            @foreach ($up_sell_ids as $up_sell_id)
                                @php
                                    $upSell_product = App\Models\Product::where('status', 1)->find($up_sell_id);
                                @endphp
                            <div class="col-12 product_{{ $upSell_product->id }}">
                                <input type="hidden" name="up_sell_product_ids[]" value="{{ $upSell_product->id }}">
                                <span><img src="/images/admin_products/small/{{ trim($upSell_product->thumbnail, '"') }}" style="width:60px; margin-right:6px;margin-top:6px"/>{{ $upSell_product->name }}</span>
                                <a href="javascript:void(0)" id="delete{{ $upSell_product->id }}" style="float:right">
                                <img  class="rotateimg45 mt-4" src="/backend/assets/images/layouts/x.png" style="width:12px;"/>
                                </a>
                            </div>
                            @endforeach
                            @endif
                            
                            {{-- <div class="col-12 col-md-6">
                                <label>Produkte Plotësues</label>

                                @error('cross_product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Ruaj</button>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publiko</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Statusi<span class="text-danger">*</span></label>
                            <select class="form-select js-example-basic-single @error('product_status') is-invalid @enderror" name="product_status" required id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="">Zgjidh...</option>
                                @foreach ($product_status as $p_status)
                                    <option 
                                        {{ $p_status == $product->product_status ? 'selected' : '' }} value="{{ $p_status }}">{{ $p_status }}</option>
                                @endforeach
                            </select>
                            @error('product_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Etiketat e Produktit</h4>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="mx-n3">
                            <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="warning" style="max-height: 220px;" class="px-3">
                                @php
                                    $selected_tags = explode(',', $product->tags);
                                @endphp
                                <div class="form-group">
                                    <label for="tags">{{ __('Tags') }} </label>
                                    <select class="form-control js-example-basic-single @error('tags') is-invalid @enderror" name="tags[]" multiple id="tags">
                                        <option value="">Zgjidh...</option>
                                        @foreach (\App\Models\Tag::get() as $tag)
                                            <option 
                                                @foreach ($selected_tags as $s_tags)
                                                    {{ $tag->name == $s_tags ? 'selected' : ''}} 
                                                @endforeach
                                            value="{{ $tag->name }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detaje rreth Produktit</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="warning" style="max-height: 220px;" class="px-3">
                                @php
                                    $filter_attribute_checked = explode(',', $product->filter_attribute_id);
                                @endphp
                                @foreach ($filter_attributes as $filter_attribute)
                                    <label class="form-check-label" for="stili">{{ $filter_attribute->name }}</label>
                                    @foreach ($filter_attribute->filterAttributeValue as $filter_attribute_value)
                                        <div class="form-check form-check-success ms-3 mb-3">
                                            <input class="form-check-input" type="checkbox" 
                                                id="{{ $filter_attribute_value->value }}{{ $filter_attribute_value->id }}" 
                                                name="filter_attribute_id[]" 
                                                value="{{ $filter_attribute_value->id }}"
                                                @foreach ($filter_attribute_checked as $f_checked)
                                                    {{ $filter_attribute_value->id == (int)$f_checked ? 'checked' : ''}} 
                                                @endforeach
                                                >
                                            <label class="form-check-label" for="{{ $filter_attribute_value->value }}{{ $filter_attribute_value->id }}">
                                                {{ $filter_attribute_value->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Guida e Madhësisë së Produktit</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="js-example-basic-single form-control @error('size_guide_id') is-invalid @enderror" name="size_guide_id">
                                <option value="">Zgjidh...</option>
                                @foreach ($size_guides as $guide)
                                    <option 
                                        {{ (int)old('size_guide_id', $product->id) === $guide->id ? 'selected' : '' }} value="{{ $guide->id }}">{{ $guide->title }}</option>
                                @endforeach
                            </select>
                            </select>
                            @error('size_guide_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Koleksioni</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            @php
                                $selected_collections = explode(',', $product->collection_id);
                            @endphp
                            <select class="form-control js-example-basic-single @error('collection_id') is-invalid @enderror" name="collection_id[]" multiple id="collection_id">
                                <option value="">Zgjidh...</option>
                                @foreach ($collections as $collection)
                                    <option 
                                        @foreach ($selected_collections as $s_collection)   
                                            {{ (int)$collection->id == (int)$s_collection ? 'selected' : ''}} 
                                        @endforeach
                                    value="{{ $collection->id }}">{{ $collection->name }}</option>
                                @endforeach
                            </select>
                            </select>
                            @error('collection_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </form>
@endsection
@push('js')
    <!-- ckeditor -->
    <script src="{{URL::asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <script src="{{URL::asset('backend/assets/js/pages/ecommerce-product-create.init.js')}}"></script>
    <script type="text/javascript">
        // search product on keyup
        $('#search').on('keyup',function(){
            $value=$(this).val();
            var route = "{{ route('app.product.product-search') }}";
            if($value != '')
            {
                $.ajax({
                    type : 'get',
                    url : route,
                    data:{'search':$value},
                    success:function(data){
                        $('#tbody').fadeIn(data);
                        $('#tbody').html(data);
                    }
                });
            }
        })

        //get the product by search onclick
        var dataArray = [];
    $(document).on('click', 'li', function() {
            $('#search').val("");

            var APP_URL = {!! json_encode(url('/app')) !!}

            var id = $(this).attr('id');

            if (id) {
                $.ajax({
                    url: APP_URL + '/product-find/' + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                        if(!(dataArray.includes(value.id))) {
                            $('#display-product').append('<div class="col-12 product_' +
                                value.id + '">' +
                                '<input type="hidden" name="product_ids[]" value="' +
                                value.id + '">' +
                                '<span><img src="/images/admin_products/small/' + value
                                .thumbnail +
                                '" style="width:60px; margin-right:6px;margin-top:6px"/>' +
                                value.name + '</span>' +
                                '<a href="javascript:void(0)" id="delete' + value.id +
                                '" style="float:right">' +
                                '<img  class="rotateimg45 mt-4" src="/backend/assets/images/layouts/x.png" style="width:12px;"/>' +
                                '</a></div>');
                        dataArray.push(value.id);
                            $('#delete' + value.id).on('click', function() {
                                    $('.product_' + value.id).remove();
                                });
                            }
                        });
                        },
                    });
            } else {
                console.log('error');
            }

            $('#tbody').fadeOut();
        });
    </script>
@endpush
