@extends('layouts.backend.app')
@push('css')
    <style>
        .modal-dialog {
            max-width: 700px !important;
        }
    </style>
@endpush
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{__('Detajet e Porosisë')}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('app.orders.index') }}">{{__('Porositë')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{__('Detajet e Porosisë')}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Porosia #KF-{{ $order->order_code }}</h5>
                        <div class="flex-shrink-0">
                            <a href="{{ route('app.orders.invoice', $order->order_code) }}"
                               class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i>
                                Faturë Klienti</a>
                            <a href="{{ route('app.orders.preinvoice', $order->order_code) }}"
                               class="btn btn-info btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Faturë
                                Produktesh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Detajet e Produktit</th>
                                <th scope="col">Çmimi</th>
                                <th scope="col">Sasia</th>
                                <th scope="col" class="text-end">Totali</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            
                                @if(!empty($orderDetail->variation) && strpos($orderDetail->variation, "-") !== false) 
                                    @php
                                        $productStock =  App\Models\ProductStock::where('variant_ids', $orderDetail->variation)->first();
                                        $img = '';
                                    @endphp
                                    
                                <!-- if order has product with variants -->
                                
                                    @if($productStock)
                                        @foreach (json_decode($productStock->image) as $key => $img)
                                            @php
                                                $firstImg = $img;
                                            @endphp
                                        @endforeach
                                    @else
                                        @php
                                            $img = '';
                                            $firstImg = $img;
                                        @endphp
                                    @endif
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                @if($img)
                                                <img src="/images/admin_variant_images/{{ $img }}" alt="{{ $img }}"
                                                     class="img-fluid d-block">
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="fs-15"><a href="" class="link-primary">{{$orderDetail->product->name }}</a></h5>
                                                <p class="text-muted mb-0">Ngjyra: 
                                                    <span class="fw-medium">
                                                    @if(strpos($productStock->variant_ids, "-") !== false)
                                                        @php
                                                            $explode_variant = explode("-", $productStock->variant_ids);
                                                            $color_id   = (int)$explode_variant[0];
                                                            $attribute_value_id    = (int)end($explode_variant);
                                                            $color = App\Models\Color::findOrFail($color_id);
                                                            $value_attribute = App\Models\AttributeValue::findOrFail($attribute_value_id);
                                                        @endphp
                                                        {{ $color->name }}
                                                    </span>
                                                </p>
                                                <p class="text-muted mb-0">{{ $value_attribute->attribute->name }}: <span class="fw-medium">{{ $value_attribute->value }}</span></p>
                                                @else
                                                @php
                                                    $color = App\Models\Color::findOrFail($productStock->variant_ids);
                                                @endphp
                                                {{ $color->name }}
                                                </span></p>
                                                @endif
                                            </div>
                                        </div>
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
                                    <td class="fw-medium text-end">
                                        ALL {{ $orderDetail->price }}
                                    </td>
                                </tr>
                                @else
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img
                                                        src="/images/admin_products/small/{{ trim($orderDetail->product->thumbnail, '"') }}"
                                                        alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="" class="link-primary">{{ $orderDetail->product->name }}</a>
                                                    </h5>
                                                </div>
                                            </div>
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
                                        <td class="fw-medium text-end">
                                            ALL {{ $orderDetail->price }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Totali i Produkteve :</td>
                                            <td class="text-end">
                                                ALL {{ number_format($order->orderDetails->sum('price'), 2) }}</td>
                                        </tr>
                                        @if (!empty($order->coupon_code))
                                            <tr>
                                                <td>Kuponi <span class="text-muted">({{ $order->coupon->title }})</span>
                                                    :
                                                </td>
                                                <td class="text-end">
                                                    -ALL {{ number_format($order->coupon_amount, 2) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>Shipping :</td>
                                            <td class="text-end">
                                                ALL {{ number_format($order->shipping_charges, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Taksa :</td>
                                            <td class="text-end">
                                                @php
                                                    $pTotal = $order->orderDetails->sum('price');
                                                    $tax_from_od = $order->orderDetails->first();
                                                    $tax = $tax_from_od->tax;
                                                    if($tax == 20){
                                                        $tax = 1/6;
                                                    }
                                                    $tax_after = ($tax*$pTotal);
                                                @endphp
                                                {{ number_format($tax_after, 2) }}
                                            </td>
                                        </tr>
                                        <tr class="border-top border-top-dashed">
                                            <th scope="row">Total (ALL) :</th>
                                            <th class="text-end">ALL
                                                @php
                                                    $coupon_amount =  $order->coupon_amount;
                                                    $shipping_charges = $order->shipping_charges;
                                                    $total_order = $pTotal - $coupon_amount + $shipping_charges + $tax_after;
                                                @endphp
                                                {{ number_format($total_order, 2) }}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Historiku i Porosisë</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                       href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-0 fw-semibold">Porosia: <span
                                                        class="fw-normal">#KF-{{ $order->order_code }}</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">Data e Krijimit:</h6>
                                        <p class="text-muted">{{ $order->created_at->format('d M, Y') }}
                                            - {{ $order->created_at->format('H:i a') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingTwo">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="mdi mdi-gift-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Aktiviteti</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                     aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    @if(!empty($order->orderHistory))
                                        @foreach ($order->orderHistory as $history)
                                            <div class="accordion-body ms-2 ps-5 pt-0">
                                                <h6 class="mb-1">Statusi: {{ $history->orderStatus->name }}</h6>
                                                <h6 class="mb-1">Posta: {{ $history->postDelivery->name }}</h6>
                                                <p class="text-muted mb-0">Ndryshuar
                                                    Nga: {{ $history->admin->name }}</p>
                                                <p class="text-muted mb-0">{{ $history->created_at->format('d M, Y') }}
                                                    - {{ $history->created_at->format('H:i a') }}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0"><i
                                class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Të Dhënat e
                            Transportit</h5>
                        {{-- <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge badge-soft-primary fs-11">Track Order</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                                   colors="primary:#231f20,secondary:#ed1c24"
                                   style="width:80px;height:80px"></lord-icon>
                        <h5 class="fs-16 mt-2">Klaudio Fashion Post</h5>
                        <p class="text-muted mb-0">Porosia: KF-{{  $order->order_code }}</p>
                        <p class="text-muted mb-0">Mënyra e Pagesës : {{ $order->paymentMethod->name }}</p>
                    </div>
                    <hr>
                    @if(empty($order->payment_gateaway))
                        <form action="{{ route('app.orders.deliver', $order->id) }}" method="POST" id="deliverOrder">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <label for="post_delivery_id" class="form-label">{{__('Posta')}}</label>
                                    <select name="post_delivery_id" class="form-control adex" id="adex" required>
                                        <option value="">Zgjidhni...</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                    @if (!empty($order->orderHistory->last()->post_delivery_id))
                                                    @if($order->orderHistory->last()->post_delivery_id === $post->id) selected='selected' @endif
                                                @endif >
                                                {{ $post->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="col-12 pt-3">
                                        <label for="order_status_id"
                                               class="form-label">{{__('Statusi i Porosisë')}}</label>
                                        <select name="order_status_id" class="form-control" required>
                                            <option value="">Zgjidhni...</option>
                                            @foreach ($orderStatuses as $status)
                                                <option value="{{ $status->id }}"
                                                        @if (!empty($order->orderHistory->last()->order_status_id))
                                                        @if($order->orderHistory->last()->order_status_id === $status->id) selected='selected' @endif
                                                    @endif >
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @include('backend.orders.partials.update-order-modal')
                                    <div class="col-12 pt-3">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="button" name="send-order-btn" id="send-order-btn" class="btn btn-sm btn-success">Dërgo
                                            Porosinë
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="fs-14 mt-2"><span class="text-muted mb-0">Mënyra e dërgimit:</span> 
                            @if($order->payment_gateaway == 1)
                                In House Post
                            @else
                                Adex Post
                            @endif
                        </p>
                        <form action="{{ route('app.orders.changeStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <div class="col-12 pt-3">
                                <label for="order_status_id"
                                        class="form-label">{{__('Statusi i Porosisë')}}</label>
                                <select name="order_status_id" class="form-control" required>
                                    <option value="">Zgjidhni...</option>
                                    @foreach ($orderStatusesUpdated as $status)
                                        <option value="{{ $status->id }}"
                                                @if (!empty($order->orderHistory->last()->order_status_id))
                                                @if($order->orderHistory->last()->order_status_id === $status->id) selected='selected' @endif
                                            @endif >
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 pt-3">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Ndrysho Status</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Detajet e Klientit</h5>
                        <div class="flex-shrink-0">
                            @if (!empty($order->customer_id))
                            <a href="{{ route('customer.show', $order->customer_id) }}" class="link-secondary">Shiko Profilin</a>
                            @elseif(empty($order->customer_id) && !empty($order->user_id))
                            <a href="{{ route('customer.showweb', $order->user_id) }}" class="link-secondary">Shiko Profilin</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (!empty($order->user->customer))
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <i class="ri-user-line me-2 align-middle text-muted fs-16"></i><b>{{ $order->user->customer->name }}</b>
                            </li>
                            @if (!empty($order->user->customer->email))
                                <li>
                                    <i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $order->user->customer->email }}
                                </li>
                            @endif
                            @if (!empty($order->user->customer->phone))
                                <li>
                                    <i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $order->user->customer->phone }}
                                </li>
                            @endif
                        </ul>
                    @else
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li><i class="ri-user-line me-2 align-middle text-muted fs-16"></i><b>{{ $order->name }}</b>
                            </li>
                            @if (!empty($order->email))
                                <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $order->email }}
                                </li>
                            @endif
                            @if (!empty($order->mobile))
                                <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{ $order->mobile }}
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Adresa e
                        Porosisë</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14">{{ $order->name }}</li>
                        <li>{{ $order->mobile }}</li>
                        <li>{{ $order->address }}</li>
                        @if(!empty($order->address_two))
                            <li><b>Adresa 2:</b> {{ $order->address_two }}</li>@endif
                        <li>{{ $order->city->name }}</li>
                        <li>{{ $order->country->name }}</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Të
                        Dhënat e Pagesës</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Porosia:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">#KF-{{ $order->order_code }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Mënyra e Pagesës:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">{{ $order->paymentMethod->name }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Statusi i Pagesës:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            @if ($order->payment_status == 0)
                                <span class="mb-0 badge rounded-pill badge-soft-danger">Pa Paguar</span>
                            @else
                                <span class="mb-0 badge rounded-pill badge-soft-success">Paguar</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <p class="text-muted mb-0">Shuma Totale:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0">ALL {{ number_format($total_order, 2) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@push('js')
    <script>
        // $(document).ready(function () {
        //     document.querySelector('#send-order-btn').addEventListener('click', function () {
        //         var myModal = document.getElementById('updateOrderModal');
        //         var modal = bootstrap.Modal.getOrCreateInstance(myModal);
        //         modal.show();
        //     })
        // });

    $(document).ready(function() {
           
        $("button[name='send-order-btn']").on('click', function () {
            var selected_value = $('#adex').find(":selected").val();
            if (selected_value == 2) {
                var myModal = document.getElementById('updateOrderModal');
                var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                modal.show();
            }else {
                $(this).closest("#deliverOrder").submit();
            }
        });
            
           
    });
    </script>
@endpush
