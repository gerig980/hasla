@extends('layouts.backend.app')
@push('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice,
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            background: #0ab39c;
            border: 1px solid #0ab39c;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }

        .flashSale-img {
            width: 20%;
            max-height: 153px;
        }

        .imgProduct {
            max-width: 63%;
            max-height: 104px;
            object-fit: fill;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('flash-sale.index') }}">Shitjet Flash</a></li>
                        <li class="breadcrumb-item active">Ndrysho Shitje Flash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('flash-sale.update', $flashSale->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ndrysho Shitje Flash</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gy-4 mb-3">
                            <div class="col-6">
                                <input type="hidden" name="id" value="{{ $flashSale->id }}">
                                <label for="title" class="form-label">Titulli<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Titulli..." name="title" value="{{ $flashSale->title }}"
                                    >
                                @error('title')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="url" class="form-label">Url Link</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                                    name="url" value="/{{ $flashSale->slug }}">
                                @error('url')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="start_date">Data e fillimit</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date"
                                        value="{{ $flashSale->start_date ? Carbon\Carbon::parse($flashSale->start_date)->format('Y-m-d') : null }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="end_date">Data e mbarimit</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date"
                                        value="{{ $flashSale->end_date ? Carbon\Carbon::parse($flashSale->end_date)->format('Y-m-d') : null }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="banner" class="form-label">Ndrysho Banerin (1920 x 530)</label>
                                <input type="file" class="form-control @error('banner') is-invalid @enderror"
                                    id="banner" name="banner">
                                @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-2 text-center" style="border: 1px solid lightgrey;">
                                    <img class="flashSale-img my-2"
                                        src="{{ URL::asset('images/flash-sales/original/' . $flashSale->banner . '') }}"
                                        alt="Baner Flash Sale">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="banner_type" class="form-label">Lloji i banerit</label>
                                <select class="js-example-basic-multiple" name="banner_type">
                                    <option value="">Zgjidh...</option>
                                    <option value="full" {{ $flashSale->banner_type == 'full' ? 'selected' : '' }}>I
                                        plotë
                                    </option>
                                    <option value="half" {{ $flashSale->banner_type == 'half' ? 'selected' : '' }}>Gjysëm
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        @if($flashSale->products)
                                            @foreach($flashSale->flashSaleProducts as $collectionProduct)
                                            <div class="col-3" id="{{ $collectionProduct->id }}">
                                                <div class="card card-body">
                                                    <div class="d-flex mb-4 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            @php
                                                            $product = \App\Models\Product::where('id', $collectionProduct->product_id)->first();
                                                            @endphp
                                                            <img src="{{ asset('images/admin_products/small/'.trim($product->thumbnail, '"')) }}" alt="" class="avatar-sm rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            @if($collectionProduct->variant_id)
                                                            @php
                                                            $variant = \App\Models\ProductStock::where('id', $collectionProduct->variant_id)->first();
                                                            @endphp
                                                                <h5 class="card-title mb-1">{{ $variant->name }}</h5>
                                                                <p class="text-muted mb-0">{{ $variant->sku }}</p>
                                                                @if($collectionProduct->discount_type == 'percent')
                                                                <p class="mb-0">Ulja: <span class="text-muted">- {{ $collectionProduct->discount }} %</span></p>
                                                                @else
                                                                <p class="mb-0">Ulja: <span class="text-muted">- {{ $collectionProduct->discount }} Lekë</span></p>
                                                                @endif
                                                            @else
                                                                <h5 class="card-title mb-1">{{ $product->name }}</h5>
                                                                <p class="text-muted mb-0">{{ $product->sku }}</p>
                                                                @if($product->discount_type == 'percent')
                                                                <p class="mb-0">Ulja: <span class="text-muted">- {{ $collectionProduct->discount }} %</span></p>
                                                                @else
                                                                <p class="mb-0">Ulja: <span class="text-muted">- {{ $collectionProduct->discount }} Lekë</span></p>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="product_ids[]" class="product-input" value="{{ $collectionProduct->product_id }}@if($collectionProduct->variant_id)-{{ $collectionProduct->variant_id }}@endif">
                                                    <a class="btn btn-primary btn-sm delete-input" data-id="{{ $collectionProduct->id }}" product-id="{{ $collectionProduct->product_id }}" variant-id="{{ $collectionProduct->variant_id }}">Fshi nga Flash Sale</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Zgjidh produkt</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 control-label" for="products">{{ __('Produktet')}}</label>
                            <div class="col-sm-12">
                                <select name="product_id[]" id="products" class="js-example-basic-single form-control select2" multiple data-title="{{ __('Zgjidh Produktet') }}" data-selected-text-format="count" data-live-search="true">
                                    @foreach(\App\Models\Product::where('status',1)->latest()->get() as $product)
                                    
                                    @if(count($product->stock) != 0)
                                        <optgroup label="{{ $product->name }}">
                                            @foreach ($product->stock as $product_stock)
                                                <option value="{{$product->id}}-{{ $product_stock->id }}">&nbsp; &nbsp; {{ $product_stock->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="{{$product->id}}">{{ $product->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-group row" id="discount_table">

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">Ruaj</button>
                                    <a href="{{ route('flash-sale.index') }}" class="btn btn-danger">Anullo</a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('js/ajax-div-load.js') }}"></script>
<script>
    let dataArray = [];
    $('.product-input').each(function() {
        var value = $(this).val();
        dataArray.push(value);
    });
    // $(document).on('click', '.delete-input', function() {
    //     var id = $(this).attr('data-id');
    //     if(id) {
    //         var element = document.getElementById(id);
    //         element.remove();
    //         for(var i = 0; i < dataArray.length; i++){
    //             if (dataArray[i] === parseInt(id)) { 
    //                 dataArray.splice(i, 1);
    //             }
    //         }
    //     }
    // });
    
        $(document).ready(function(){
        $('#products').on('change click', function(){
            var product_ids = $('#products').val();
            if(product_ids.length > 0){
                $('#products option:selected').each(function() {
                    if(dataArray.includes($(this).val())) {
                        var index = product_ids.indexOf($(this).val());
                        if (index !== -1) {
                            product_ids.splice(index, 1);
                        }
                        $('button[aria-describedby*="'+$(this).val()+'"]').click();
                    } 
                    $.post('{{ route('flash-sale.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                    });
                });

                // if(dataArray.includes(product_ids)) {
                //     alert('Produkti eshte shtuar me pare!');
                //     console.log(product_ids);
                // } else {
                //     $.post('{{ route('flash-sale.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                //     $('#discount_table').html(data);
                // });
                // dataArray.push(product_ids);
                // }
            }
            else{
                $('#discount_table').html(null);
            }
        });
    });

        //remove items
        $('.itemsTable').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        });

        $(document).ready(function() {
            $('select[name="products1"]').on('change', function() {
                // var img = document.getElementById("product-img");
                var APP_URL = {!! json_encode(url('/app')) !!}
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: APP_URL + '/product-price/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            e = $('input[name="price"]').empty();
                            f = $('input[name="thumbnail"]').empty();
                            $.each(data, function(key, value) {
                                $('input[name="price"]').val(value.price);
                                $('input[name="thumbnail"]').val(value.thumbnail);
                            });
                        }
                    });
                } else {
                    console.log('error');
                }
            });
        });

        //Confirm Delete with Sweet Alert
        $(".delete-input").click(function() {
            var APP_URL = {!! json_encode(url('/app')) !!}
            var record = $(this).attr("flashSale-id");
            var recordId = $(this).attr("data-id");
            Swal.fire({
                title: 'Jeni të sigurt që doni ta fshini postimin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije postimin!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.value) {
                    window.location.href = APP_URL + "/delete-flashSaleProduct/" + recordId;
                }
            });
        });
    </script>
@endpush
