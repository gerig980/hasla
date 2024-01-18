@extends('layouts.backend.app') 
@push('css')
@endpush
@section('content')

 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Detajet e Produktit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Detajet e Produktit</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5">
                    <div class="col-xl-4 col-md-8 mx-auto">
                        <div class="product-img-slider sticky-side-div">
                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                <div class="swiper-wrapper" id="swiper-wrapper-024cf815f6e6235c" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 396px; margin-right: 24px;">
                                        <img src="{{ URL::asset('images/admin_products/large/'.$product->thumbnail) }}" alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                            </div>
                            <!-- end swiper thumbnail slide -->
                            <div class="swiper product-nav-slider mt-2 swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                                <div class="swiper-wrapper" id="swiper-wrapper-4210d45844be673e4" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach($product->images as $image)
                                    <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group" aria-label="1 / 4" style="width: 95.5px; margin-right: 10px;">
                                        <div class="nav-slide-item">
                                            <img src="{{ URL::asset('images/product_gallery/'.$image) }}" alt="" class="img-fluid d-block">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            <!-- end swiper nav slide -->
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div><a class="text-primary d-block">@if($product->product_status == 'published') Publikuar @else Draft @endif</a></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Shtuar më : <span class="text-body fw-medium">{{ $product->created_at->format('d M, Y') }}</span></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">BARCODE i produktit : <span class="text-body fw-medium">{{ $product->barcode }}</span></div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <a href="{{ route('app.product.edit', $product->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Çmimi :</p>
                                                <h5 class="mb-0">{{ $product->price }} ALL</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-file-copy-2-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Numri i Porosive :</p>
                                                <h5 class="mb-0">{{ $orders }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-stack-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Në Stok :</p>
                                                <h5 class="mb-0"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-3 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-inbox-archive-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">Fitimi mbi produkt :</p>
                                                <h5 class="mb-0">{{ $orders*$product->price }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>

                            @if($product->productStocks)
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mt-4">
                                        <h5 class="fs-14">Variantet e produktit :</h5>
                                        @foreach ($product->productStocks as $product_stock)
                                            @php
                                            if(strpos($product_stock->variant_ids, "-") !== false){
                                                $expl_ids   = explode('-',$product_stock->variant_ids);
                                                $color_id   = (int)$expl_ids[0];
                                                $variant_id = (int)end($expl_ids);
                                                $color      = \App\Models\Color::where('id',$color_id)->first();
                                                $variant    = \App\Models\AttributeValue::where('id',$variant_id)->first();
                                            } else {
                                                $variant = '';
                                                $color = '';
                                            }
                                        @endphp
                                        <div class="card p-2">
                                        <div class="d-flex flex-wrap gap-2">
                                            @if($product_stock->image != [])
                                            <div class="d-flex">
                                                @foreach (json_decode($product_stock->image) as $key => $img)
                                                <div class="avatar me-2">
                                                    <img src="{{ URL::asset('images/admin_variant_images/'.$img) }}" alt="" class="img-fluid d-block" />
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                                <input type="radio" class="btn-check" name="productsize-radio" id="productsize-radio2">
                                                @if($variant != '')
                                                <label class="btn btn-soft-primary avatar-xs rounded-circle p-0 fs-10 d-flex justify-content-center align-items-center" for="productsize-radio2">{{ $variant->value }}</label>
                                                @endif
                                            </div>
                                            <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                                @if($color != '')
                                                <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                                    <div style="background-color:{{ $color->code }}; border-radius: 50%; height:22px; width:22px;"></div>
                                                </button>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1 fs-11">Çmimi :</p>
                                                <h5 class="my-0 fs-11">{{ $product_stock->price }} ALL</h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1 fs-11">SKU :</p>
                                                <h5 class="my-0 fs-11">{{ $product_stock->sku }} ALL</h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1 fs-11">Në Stok :</p>
                                                <h5 class="my-0 fs-11">{{ $product_stock->current_stock }} ALL</h5>
                                            </div>
                                        </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">Përshkrimi :</h5>
                                @if($product->description)
                                <p>{{ $product->description }}</p>
                                @else
                                <p>Produkti nuk ka përshkrim</p>
                                @endif
                            </div>


                            <div class="product-content mt-5">
                                <h5 class="fs-14 mb-3">Specifika të Produktit :</h5>
                                <nav>
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Atributet e Filtrave</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Detaje</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                @if($product->filter_attribute_id)
                                                <tbody>
                                                @php
                                                    $attributes = explode(',', $product->filter_attribute_id);
                                                @endphp
                                                @foreach($attributes as $attribute)
                                                    @if($productDesc = \App\Models\FilterAttributeValue::where('id', $attribute)->first())
                                                    <tr>
                                                        <th scope="row" style="width: 200px;">{{ $productDesc->filterAttribute->name }}</th>
                                                        <td>{{ $productDesc->value }}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                        <div>
                                            <h5 class="font-size-16 mb-3">Detaje të tjera të produktit</h5>
                                            <div>
                                                @if($product->length)
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i><b>Gjatësia:</b> {{ $product->length }} cm</p>
                                                @endif
                                                @if($product->wide)
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i><b>Gjerësia:</b> {{ $product->wide }} cm</p>
                                                @endif
                                                @if($product->height)
                                                <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i><b>Lartësia:</b> {{ $product->height }} cm</p>
                                                @endif
                                                @if($product->weight)
                                                <p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i><b>Pesha:</b> {{ $product->weight }} cm</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product-content -->

                            <div class="mt-5">
                                <div class="row gy-4 gx-0">
                                    <div class="col-lg-12">
                                        <div class="d-flex flex-wrap align-items-start gap-3">
                                            <h5 class="fs-14">Produkte të ngjashme: </h5>
                                        </div>
                                        <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                            <ul class="list-unstyled mb-0">
                                                <li class="py-2">
                                                    <div class="border border-dashed rounded p-3">
                                                            @if($product->up_sell_product_ids)
                                                            @php
                                                                $relatedProducts = explode(',', $product->up_sell_product_ids);
                                                            @endphp
                                                            <div class="d-flex flex-grow-1 gap-2 mb-3">
                                                                @foreach($relatedProducts as $related)
                                                                @if($relatedProduct = \App\Models\Product::where('id', $related)->first())
                                                                <a href="{{ route('app.product.show', $relatedProduct->id) }}" class="d-block" style="width:70px;">
                                                                    <img src="{{ URL::asset('images/admin_products/small/'.$relatedProduct->thumbnail) }}" alt="" class="avatar-sm rounded object-cover">
                                                                    <h5 class="fs-12 mb-0">{{ $relatedProduct->name }}</h5>
                                                                </a>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                            @endif
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Ratings & Reviews -->
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@push('js')
@endpush