@extends('layouts.backend.app') 
@push('css')
<style>
.checkout-tab {
    max-height: 1200px;
    overflow-y: auto;
}
.rotateimg45 {
    -webkit-transform:rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
}
.number span {
    cursor:pointer; 
}
.number .minus, .number .plus{
    width:20px;
    height:20px;
    background:#f2f2f2;
    border-radius:4px;
    padding:0px 5px 0px 5px;
    border:1px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    text-align: center;
}
.number input{
    height:20px;
    width: 45px;
    text-align: center;
    font-size: 12px;
    border:1px solid #ddd;
    border-radius:4px;
    display: inline-block;
    vertical-align: middle;
}
.success-text {
    display: none;
}
</style>
@endpush
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Sistemi-POS</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sistemi-POS</a></li>
                        <li class="breadcrumb-item active">Menaxho-POS</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body checkout-tab">

                    <form action="{{ route('app.pos.pos-search') }}">
                        <div class="row mb-3">
                            <div class="col-12 col-md-7">
                                <input type="text" name="search" class="form-control" id="search-product" placeholder="Kërko emër produkti, barkod" value="">
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="js-example-basic-single form-control" name="category_id" data-toggle="select2">
                                    <option disabled selected>Zgjidh Kategorinë...</option>
                                        @foreach($categories as $single_category)
                                            <option value="{{ $single_category->id }}"> &#9654; {{ $single_category->name }}</option>
                                                @foreach($single_category->children as $child_first)
                                                    @if(!empty($child_first))
                                                        <option value="{{ $child_first->id }}"> &nbsp;&nbsp;&#9656;&#9656; {{ $child_first->name }}</option>
                                                    @endif
                                                    @foreach($child_first->children as $child_second)
                                                        @if(!empty($child_second))
                                                            <option value="{{ $child_second->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#9656;&nbsp; {{ $child_second->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <input type="submit" class="btn btn-soft-info waves-effect waves-light" value="Kërko">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        @foreach ($products as $product)
                         {{-- @php 
                        echo $product->getDiscountPercentageAttribute();
                        @endphp  --}}
                            <div class="col-6 col-md-3">
                                <div class="card">
                                    <img class="card-img-top img-fluid image-product-{{ $product->id }}" image-product="{{ trim($product->thumbnail, '"') }}" src="{{ URL::asset('images/admin_products/small/'.trim($product->thumbnail, '"')) }}" alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2 name-product-{{ $product->id }}" name-product="{{ $product->name }}">{{ $product->name }}</h4>
                                        <div class="d-flex justify-content-start">
                                            @php
                                                $flash_sale_discount_amount = \App\Models\FlashSale::getFlashSaleDiscount($product->id, 0); //0 bcs we are checking fot flash sale on prodyct without variations
                                            @endphp
                                            @if($flash_sale_discount_amount != 0)
                                            <p class="card-text text-muted text-decoration-line-through">{{ $product->price  }} ALL</p>
                                            <p class="card-text ms-3 price-product-{{ $product->id }}" price-product="{{ $flash_sale_discount_amount }}">{{ $flash_sale_discount_amount }} ALL</p>
                                            @else

                                                @if(empty($product->productStocks->first()->product_id))
                                                    @if(!empty($product->special_discount) && !empty($product->special_discount_start) && !empty($product->special_discount_end))
                                                        @if(Carbon\Carbon::now() >= $product->special_discount_start && Carbon\Carbon::now() <= $product->special_discount_end)
                                                            @if($product->special_discount_type == 'flat')
                                                                @php
                                                                    $price_with_discount = $product->price - $product->special_discount;
                                                                @endphp
                                                                <p class="card-text text-muted text-decoration-line-through">{{ $product->price }} ALL</p>
                                                                <p class="card-text ms-3 price-product-{{ $product->id }}" price-product="{{ $price_with_discount }}">{{ $price_with_discount }} ALL</p>
                                                            @elseif($product->special_discount_type == 'percentage')
                                                                @php
                                                                    $price_with_discount = $product->price - $product->price * $product->special_discount / 100;
                                                                @endphp
                                                                <p class="card-text text-muted text-decoration-line-through">{{ $product->price }} ALL</p>
                                                                <p class="card-text ms-3 price-product-{{ $product->id }}" price-product="{{ $price_with_discount }}">{{ $price_with_discount }} ALL</p>
                                                            @endif
                                                        @else
                                                            <p class="card-text pb-3 price-product-{{ $product->id }}" price-product="{{ $product->price  }}">{{ $product->price }} ALL</p>
                                                        @endif
                                                    @elseif(!empty($product->special_discount) && empty($product->special_discount_start) && empty($product->special_discount_end))
                                                        @if($product->special_discount_type == 'flat')
                                                            @php
                                                                $price_with_discount = $product->price - $product->special_discount;
                                                            @endphp
                                                            <p class="card-text text-muted text-decoration-line-through">{{ $product->price }} ALL</p>
                                                            <p class="card-text ms-3 price-product-{{ $product->id }}" price-product="{{ $price_with_discount }}">{{ $price_with_discount }} ALL</p>
                                                        @elseif($product->special_discount_type == 'percentage')
                                                            @php
                                                                $price_with_discount = $product->price - $product->price * $product->special_discount / 100;
                                                            @endphp
                                                            <p class="card-text text-muted text-decoration-line-through">{{ $product->price }} ALL</p>
                                                            <p class="card-text ms-3 price-product-{{ $product->id }}" price-product="{{ $price_with_discount }}">{{ $price_with_discount }} ALL</p>
                                                        @endif
                                                    @else
                                                        <p class="card-text mb-3 price-product-{{ $product->id }}" price-product="{{ $product->price }}">{{ $product->price }} ALL</p>
                                                    @endif
                                                @else
                                                    <div class="pb-3">
                                                        @php
                                                            $expl_ids   = explode('-',$product->productStocks->first()->variant_ids );
                                                            $variant_id = (int)end($expl_ids);
                                                            if(!empty($variant_id)){
                                                                $variant = \App\Models\AttributeValue::where('id',$variant_id)->first();
                                                            }
                                                        @endphp
                                                        <span class="badge badge-outline-dark">Ngjyra</span>
                                                        <span class="badge badge-outline-dark me-1">{{ $variant->attribute->name }}</span>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="d-grid gap-2" > 
                                            @if(!empty($product->productStocks->first()->product_id))
                                                <button class="btn btn-sm btn-soft-danger waves-effect waves-light add-btn" 
                                                    data-bs-toggle="modal" data-bs-target="#fadeInleftModal{{ $product->id }}"  type="button">
                                                    Përzgjidh Produkt<i class="ri-shopping-bag-line label-icon align-middle rounded-pill fs-16 ms-2"></i>
                                                </button>
                                            @else
                                                <button id="add-btn-{{ $product->id }}" product-id="{{ $product->id }}"
                                                    class="btn btn-sm btn-soft-danger waves-effect waves-light add-btn" type="button" >
                                                    Shto Produkt<i class="ri-shopping-bag-line label-icon align-middle rounded-pill fs-16 ms-2"></i>
                                                </button>
                                            @endif
                                            @include('backend.modals.pos-variant-product') 
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        @endforeach
                    </div><!-- end row -->
                    {{-- <div class="row">
                        <div class="col-12 pt-4 pb-3 text-center">
                            <button class="btn btn-sm btn-soft-warning waves-effect waves-light" type="button">Shiko më shumë...</button>
                        </div>
                    </div> --}}
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Të Dhënat e Porosisë</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-10 col-md-5">
                                <select class="js-example-basic-single form-control" name="category_id" data-toggle="select2">
                                    <option value="" selected>Zgjidh Klient...</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-10 col-md-5">
                                <select class="js-example-basic-single form-control" id="order" name="order" data-toggle="select2">
                                    <option value="" selected>Klienti nga...</option>
                                    @foreach ($orders_from as $order_from)
                                    <option value="{{ $order_from }}">{{ $order_from }}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 col-md-2 px-0">
                                <a class="btn btn-soft-info waves-effect waves-light w-100 px-0" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" id="icon" style="display:none;">
                                    <span >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    </span>
                                </a>
                                <a class="btn btn-soft-info waves-effect waves-light w-100 px-0" data-bs-toggle="modal" id="add-client" data-bs-target="#exampleModalgrid1">
                                    <span >
                                    Shto Klient
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="row pt-2 success-text">
                            <p style="color: #f00;font-style:italic;">Klienti dhe Adresa u memorizuan me sukses! Ju mund të vazhdoni me përfundimin e porosisë.</p>
                        </div>
                        @include('backend.modals.pos-add-address')
                        @include('backend.modals.pos-choose-address')
                    <form method="POST" action="{{ route('app.pos.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="order_from" value="" id="order_from">
                        <input type="hidden" name="address_id" value="" id="address_id"> 
                        <div class="table-responsive table-card pt-5">
                            <table class="table table-borderless align-middle mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th style="width: 90px;" scope="col">Produkti</th>
                                        <th scope="col">Info </th>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-end">Çmimi</th>
                                        <th scope="col" class="text-end"></th>
                                    </tr>
                                </thead>
                                <tbody id="display-product"></tbody>
                            </table>
                            <button class="calculate" style="display:none;">Llogarit Totalin</button>
                            <table class="table table-borderless align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-semibold" colspan="2">Totali i Produkteve:</td>
                                        <td class="fw-semibold text-end">
                                        <input class="form-control form-control-solid labell text-right subtotal" type="text" id="total_prod_amount"  name="subtotal" value="ALL 0.00" readonly  style="max-height: 45px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Shipping :</td>
                                        <td class="text-end"><input type="number" name="shipping_cost" class="shipping form-control" placeholder="Vlera e Transportit" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Tax(TVSH) : </td>
                                        <td class="text-end">
                                            <select name="tax" class="form-control tax">
                                                <option selected disabled>Tax</option>
                                                @foreach($taxes as $tax)
                                                    <option value="{{ $tax->percentage }}">{{ $tax->percentage }} %</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Kupon : </td>
                                        <td class="text-end">
                                            <select name="coupon_value" class="form-control coupon">
                                                <option selected disabled>Përzgjidh një kupon</option>
                                                @foreach ($coupons as $coupon)
                                                    <option value="{{ $coupon->discount }}"  
                                                            discount_type="{{ $coupon->discount_type }}"
                                                            coupon_code="{{ $coupon->code }}"
                                                            >
                                                            {{ $coupon->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" class="coupon_code" name="coupon_code">
                                            <input type="hidden" class="coupon_amount" name="coupon_amount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Mënyra e Pagesës : </td>
                                        <td class="text-end">
                                            <select name="payment_method_id" class="form-control" required>
                                                <option selected disabled>Pagesa në</option>
                                                @foreach($payment_methods as $payment_method)
                                                    <option value="{{ $payment_method->id }}">{{ $payment_method->name }} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="table-active fs-14">
                                        <th colspan="2">Total (ALL) :</th>
                                        <td class="text-end">
                                            <span class="fw-semibold grandTotal"></span>
                                            <input type="hidden" name="grand_total" class="grandTotal-input">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-grid gap-2 pt-2" >
                                <button class="btn btn-warning" type="submit">Përfundo Porosinë</button>
                            </div>
                        </div>
                        
                        <input type="hidden" name="client_adress" value="" id="client_ad">
                    </form>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
@push('js')
<!-- input spin init -->
<script src="{{URL::asset('backend/assets/js/pages/form-input-spin.init.js')}}"></script>

@include('backend.pos.add-to-cart')
<script>
$('#order').change(function(){
    $('#order_from').val($(this).val());
    var order = $('#order_from').val($(this).val());
});
</script>
@endpush