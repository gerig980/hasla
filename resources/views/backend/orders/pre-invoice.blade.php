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
                            </div>
                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                <h6><span class="text-muted fw-normal">Nr. Faturës:</span><span id="legal-register-no"> KF-{{ $order->order_code }}</span></h6>
                                <h6><span class="text-muted fw-normal">Data:</span><span id="email"> {{ $order->created_at->format('d M, Y') }}, {{ $order->created_at->format('H:i a') }}</span></h6>
                                <h6><span class="text-muted fw-normal">Adresa:</span><span id="legal-register-no"> {{ $order->address }}</span></h6>
                                @if(!empty($order->address_two))
                                <h6><span class="text-muted fw-normal">Adresa 2:</span><span id="legal-register-no"> {{ $order->address_two }}</span></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end card-header-->
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