@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
<style>
    .input-group-text{
        height: 42px;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">{{ __('Krijo Kupona') }}</h4>
          <div class="page-title-right">
             <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('coupons.index') }}">{{ __('Lista e Kuponave') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Edito Kupon') }}</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
<!-- end page title -->

    <div class="row">
        <div class="col-xl-10 offset-1">
            <div class="card">
                <div class="card-body checkout-tab">
                    <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="type" class="form-label">Emri i Kuponit<span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $coupon->title }}" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="type" class="form-label">Kodi i Kuponit<span class="text-danger">*</span></label>
                                    <input type="text" name="code" value="{{ $coupon->code }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="type" class="form-label">Tipi i Kuponit<span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <select class="js-example-basic-multiple form-control" name="type" id="couponType">
                                            <option @if($coupon->type == 'product_base') selected @endif value="product_base">{{ __('Kupon Per Produkt') }}</option>
                                            <option @if($coupon->type == 'invoice_base') selected @endif value="invoice_base">{{ __('Kupon Total Fature') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="date" class="form-label">{{ __('Statusi') }}<span class="text-danger">*</span></label>
                                    <select class="form-control js-example-basic-single" name="status" data-title="discount_type" id="discount_type">
                                        <option @if($coupon->status == 1) selected @endif value="1">{{ __('Aktiv') }}</option>
                                        <option @if($coupon->status == 0) selected @endif value="0">{{ __('Jo Aktiv') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label class="form-label">{{ __('Tipi i Zbritjes') }} <span class="text-danger">*</span></label>
                                    <select class="form-control js-example-basic-single" name="discount_type" data-title="discount_type" id="discount_type">
                                        <option class="@if($coupon->discount_type == 'flat') selected @endif" value="flat">{{ __('Shumë Lekësh') }}</option>
                                        <option class="@if($coupon->discount_type == 'percent') selected @endif" value="percent">{{ __('%') }}</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="discount" class="form-label">{{ __('Zbritja') }} <span class="text-danger">*</span></label>
                                    <input type="number" step="any" name="discount" id="discount" value="{{ $coupon->discount }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="start_date" class="form-label">{{ __('Data e fillimit') }} {{ date_format(date_create($coupon->start_date), 'm/d/Y') }}<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" value="{{ $coupon->start_date ? Carbon\Carbon::parse($coupon->start_date)->format('Y-m-d') : null }}" name="start_date">
                                </div>
                                <div class="col-6">
                                    <label for="end_date" class="form-label">{{ __('Data e mbarimit') }} {{ date_format(date_create($coupon->end_date), 'm/d/Y') }}<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" value="{{ $coupon->end_date ? Carbon\Carbon::parse($coupon->end_date)->format('Y-m-d') : null }}" name="end_date">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <label for="banner" class="form-label">{{ __('Foto Baneri') }}</label>
                                    <div class="input-group">
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                    <div class="mt-2 text-center" style="border: 1px solid lightgrey;">
                                    @if($coupon->banner)
                                    <img class="flashSale-img my-2"
                                        src="{{ URL::asset('images/coupons/' . $coupon->banner . '') }}"
                                        alt="Baner Kupon">
                                    @endif
                                </div>
                                </div>
                                <div class="col-6">
                                    <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="warning" style="max-height: 220px;" class="@if($coupon->type == 'invoice_base') d-none @endif" class="px-3" id="coupon-type">
                                        @php
                                            if($coupon->product_id) {
                                            $selected_products = $coupon->product_id;
                                            }
                                        @endphp
                                        <div class="form-group">
                                            <label for="product_id">{{ __('Produktet') }} </label>
                                            <select class="form-control js-example-basic-single" name="product_id[]" multiple id="product_id"  aria-hidden="true">
                                                <option value="" disabled>Zgjidh...</option>
                                                @if($coupon->product_id)
                                                @foreach (\App\Models\Product::get() as $product)
                                                    <option  style="text-transform:uppercase;"
                                                        @foreach ($selected_products as $selected_product)
                                                                {{ $product->id == (int)$selected_product ? 'selected' : ''}}
                                                        @endforeach
                                                    value="{{ $product->id }}">{{ $product->name }} {{ $product->sku }}</option>
                                                @endforeach
                                                @else
                                                @foreach (\App\Models\Product::get() as $product)
                                                    <option value="{{ $product->id }}"  style="text-transform:uppercase;">{{ $product->name }} {{ $product->sku }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#couponType').on('change', function() {
            if($(this).val() === 'product_base') {
                $('#coupon-type').removeClass('d-none');
                $('#coupon-type').addClass('d-block');
            } else {
                $('#coupon-type').removeClass('d-block');
                $('#coupon-type').addClass('d-none');
            }
        });
    });
</script>
<script type="text/javascript">
        $(document).ready(function () {
            $('.product-by-ajax').select2({
                placeholder: "{{ __('Zgjidh Produkt') }}",
                minimumInputLength: 1,
                closeOnSelect: true,
                'multiple': true,
                ajax: {
                    type: "GET",
                    dataType: 'json',
                    url: '{{ route('product.by.ajax') }}',
                    data: function (params) {
                        return {
                            q: params.term // search term
                        };
                    },
                    delay: 250,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
