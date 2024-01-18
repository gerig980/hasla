@extends('layouts.backend.app') 
@push('css')

@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Të Dhënat e Faturës</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('app.orders.show', $order->id) }}">Porosia</a></li>
                    <li class="breadcrumb-item active">Të Dhënat e Faturës</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row justify-content-center">
    <div class="col-xxl-9">
        <div class="card" id="demo">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header border-bottom-dashed p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <img src="/images/logo-klaudio.svg" class="card-logo card-logo-dark" alt="logo dark" height="40">
                                <img src="assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                                <div class="mt-sm-5 mt-4">
                                    <h6 class="text-muted text-uppercase fw-semibold">Adresa</h6>
                                    <p class="text-muted mb-1" id="address-details">Rr. Viktor Eftimiu</p>
                                    <p class="text-muted mb-0"><span>Korçë,</span> Albania</p>
                                </div>
                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Nipt:</span><span id="legal-register-no">K00000000F</span></h6>
                                <h6><span class="text-muted fw-normal">Email:</span><span id="email">klaudiofashion.outlet@gmail.com</span></h6>
                                <h6><span class="text-muted fw-normal">Website:</span> <a href="https://klaudiofashion.al" class="link-primary" target="_blank" id="website">www.klaudiofashion.al</a></h6>
                                <h6 class="mb-0"><span class="text-muted fw-normal">WhatsApp: </span><span id="contact-no"> +355 697 265 765</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Nr. Faturës</p>
                                <h5 class="fs-14 mb-0">KF-{{ $order->order_code }}</h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Data</p>
                                <h5 class="fs-14 mb-0"><span id="invoice-date">{{ $order->created_at->format('d M, Y') }}</span> <small class="text-muted" id="invoice-time">{{ $order->created_at->format('H:i a') }}</small></h5>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Statusi i Pagesës</p>
                                @if ($order->payment_status == 0)
                                <span class="badge badge-soft-danger fs-11" id="payment-status">Pa Paguar</span>
                                @else
                                <span class="badge badge-soft-success fs-11" id="payment-status">Paguar</span>
                                @endif
                            </div>
                            <!--end col-->
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-2 text-uppercase fw-semibold">Shuma Totale</p>
                                @php
                                    $pTotal = $order->orderDetails->sum('price');
                                    $tax_from_od = $order->orderDetails->first();
                                    $tax = $tax_from_od->tax;
                                    if($tax == 20){
                                        $tax = 1/6;
                                    }
                                    $tax_after = ($tax*$pTotal);
                                    $coupon_amount =  $order->coupon_amount;
                                    $shipping_charges = $order->shipping_charges;
                                    $total_order = $pTotal - $coupon_amount + $shipping_charges + $tax_after;
                                @endphp
                                <h5 class="fs-14 mb-0">ALL<span id="total-amount">{{ number_format($total_order, 2) }}</span></h5>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4 border-top border-top-dashed">
                        <div class="row g-3">
                            <div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Adresa e Porosisë</h6>
                                <p class="fw-medium mb-2" id="billing-name">{{ $order->name }}</p>
                                <p class="text-muted mb-1" id="billing-address-line-1">{{ $order->address }}</p>
                                <p class="text-muted mb-1" id="billing-address-line-1"><span>{{ $order->city->anme }}, </span>{{ $order->country->name }}</p>
                                <p class="text-muted mb-1"><span>Nr. Cel: </span><span id="billing-phone-no">{{ $order->mobile }}</span></p>
                            </div>
                            <!--end col-->
                            @if(!empty($order->address_two))
                            <div class="col-6">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Adresa 2</h6>
                                <p class="fw-medium mb-2" id="shipping-name">{{ $order->name }}</p>
                                <p class="text-muted mb-1" id="shipping-address-line-1">{{ $order->address_two }}</p>
                                <p class="text-muted mb-1"><span>Nr. Cel: </span><span id="shipping-phone-no">{{ $order->mobile }}</span></p>
                            </div>
                            @endif
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th scope="col">Detajet e Produktit</th>
                                        <th scope="col">Çmimi</th>
                                        <th scope="col">Sasia</th>
                                        <th scope="col" class="text-end">Totali</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">
                                    @foreach ($order->orderDetails as $orderDetail)
                                        @if(!empty($orderDetail->variation))
                                            @php
                                                $productStock =  App\Models\ProductStock::where('variant_ids', $orderDetail->variation)->first();
                                            @endphp 
                                             <!-- if order has product with variants -->
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="text-start">
                                                    <span class="fw-medium">{{ $productStock->name }}</span>

                                                    @if(strpos($productStock->variant_ids, "-") !== false)
                                                        @php
                                                            $explode_variant = explode("-", $productStock->variant_ids);
                                                            $color_id   = (int)$explode_variant[0];
                                                            $attribute_value_id    = (int)end($explode_variant);
                                                            $color = App\Models\Color::findOrFail($color_id);
                                                            $value_attribute = App\Models\AttributeValue::findOrFail($attribute_value_id);
                                                        @endphp
                                                        <p class="text-muted mb-0">{{ $color->name }},  {{ $value_attribute->value }}</p>
                                                    @else
                                                        @php
                                                            $color = App\Models\Color::findOrFail($productStock->variant_ids);
                                                        @endphp
                                                        <p class="text-muted mb-0">{{ $color->name }}</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @php 
                                                        $total_price  = (int)$orderDetail->price; //total price (price * quantity)
                                                        $qty    = (int)$orderDetail->quantity;
                                                        $price    = $total_price/$qty;
                                                    @endphp
                                                    ALL {{ $price }}
                                                </td>
                                                <td>{{ $orderDetail->quantity }}</td>
                                                <td class="text-end">ALL {{ $orderDetail->price }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="text-start">
                                                    <span class="fw-medium">{{ $orderDetail->product->name }}</span>
                                                </td>
                                                <td>
                                                    @php 
                                                        $total_price  = (int)$orderDetail->price; //total price (price * quantity)
                                                        $qty    = (int)$orderDetail->quantity;
                                                        $price    = $total_price/$qty;
                                                    @endphp
                                                    ALL {{ $price }}
                                                </td>
                                                <td>{{ $orderDetail->quantity }}</td>
                                                <td class="text-end">
                                                    ALL {{ $orderDetail->price }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table><!--end table-->
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                <tbody>
                                    <tr>
                                        <td>Totali i Produkteve :</td>
                                        <td class="text-end">ALL {{ number_format($order->orderDetails->sum('price'), 2) }}</td>
                                    </tr>
                                    @if (!empty($order->coupon_code))
                                    <tr>
                                        <td>Kuponi <span class="text-muted">({{ $order->coupon->title }})</span> :</td>
                                        <td class="text-end">-ALL {{ number_format($order->coupon_amount, 2) }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Shipping :</td>
                                        <td class="text-end">ALL {{ number_format($order->shipping_charges, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Taksa :</td>
                                        <td class="text-end"> {{ number_format($tax_after, 2) }}
                                        </td>
                                    </tr>
                                    <tr class="border-top border-top-dashed">
                                        <th scope="row">Total (ALL) :</th>
                                        <th class="text-end">ALL {{ number_format($total_order, 2) }}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                            <a href="javascript:window.print()" class="btn btn-success print"><i class="ri-printer-line align-bottom me-1"></i> Shkarko/Printo</a>
                        </div>
                    </div>
                    <!--end card-body-->
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@push('js')
@endpush