@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panelet</a></li>
                        <li class="breadcrumb-item active">Paneli</li>
                    </ol>
                </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1"></div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto"></div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> 
                                          <a href="{{ route('app.product.create') }}"> Shto Produkt</a> </button>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-uppercase fw-medium text-muted text-truncate mb-0"> Fitimi Total</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    @php
                                    $sumproductsstock = 0;
                                    @endphp
                                    @foreach($sum as $total)
                                    @php
                                    $sumproductsstock = $sumproductsstock +  $total;
                                    @endphp
                                    @endforeach
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">ALL <span class="counter-value" data-target="{{ $sumproductsstock }}">0</span></h4>
                                    <a href="" class="text-decoration-underline">Shiko fitimin neto</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-uppercase fw-medium text-muted text-truncate mb-0">Porositë</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ count($orders)}}">0</span></h4>
                                    <a href="{{ route('app.orders.index') }}" class="text-decoration-underline">Shiko të gjithë porositë</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-shopping-bag text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-uppercase fw-medium text-muted text-truncate mb-0">Klientët</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ count($customers) + count($webcustomers)}}">0</span></h4>
                                    <a href="{{ route('customers.web') }}" class="text-decoration-underline">Shiko klientët WEB</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-warning rounded fs-3">
                                        <i class="bx bx-user-circle text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-uppercase fw-medium text-muted text-truncate mb-0"> Produktet</h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">ALL <span class="counter-value" data-target="{{ count($products) }}">0</span></h4>
                                    <a href="{{ route('app.product.index') }}" class="text-decoration-underline">Shiko Produktet</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class="bx bx-wallet text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->

            <!-- <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Të ardhurat</h4>
                            <div>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    1M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    6M
                                </button>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    1Y
                                </button>
                            </div>
                        </div>

                        <div class="card-header p-0 border-0 bg-soft-light">
                            <div class="row g-0 text-center">
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="7585">0</span></h5>
                                        <p class="text-muted mb-0">Porositë</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1">$<span class="counter-value" data-target="22.89">0</span>k</h5>
                                        <p class="text-muted mb-0">Fitimet</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span class="counter-value" data-target="367">0</span></h5>
                                        <p class="text-muted mb-0">Refunds</p>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="p-3 border border-dashed border-start-0 border-end-0">
                                        <h5 class="mb-1 text-success"><span class="counter-value" data-target="18.92">0</span>%</h5>
                                        <p class="text-muted mb-0">Raporti i bisedave</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0 pb-2">
                            <div class="w-100">
                                <div id="customer_impression_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Shitjet sipas vendndodhjeve</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    Eksporto Raportin
                                </button>
                            </div>
                        </div>

                        
                        <div class="card-body">
                            <div id="sales-by-locations" data-colors='["--vz-light", "--vz-success", "--vz-primary"]' style="height: 269px" dir="ltr"></div>
                                <div class="px-2 py-2 mt-1">
                                    <p class="mb-1">Canada <span class="float-end">75%</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
                                    </div>

                                    <p class="mt-3 mb-1">Greenland <span class="float-end">47%</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="47"></div>
                                    </div>

                                    <p class="mt-3 mb-1">Russia <span class="float-end">82%</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="82"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> -->
           
            
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Produktet më të shitura</h4>
                            
                            <!-- <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase fs-12">Rendit sipas:
                                        </span><span class="text-muted">Sot<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Sot</a>
                                        <a class="dropdown-item" href="#">Dje</a>
                                        <a class="dropdown-item" href="#">7 Ditët e fundit</a>
                                        <a class="dropdown-item" href="#">30 ditët e fundit</a>
                                        <a class="dropdown-item" href="#">Këtë muaj</a>
                                        <a class="dropdown-item" href="#">Muajin e kaluar</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <tbody>
                                        @foreach (array_unique($productsOrdered) as $product)
                                        @php
                                            $prod = \App\Models\Product::where('id', $product)->latest()->first();
                                            $countOrder = count(\App\Models\OrderDetail::where('product_id', $product)->get());
                                            $countSum = \App\Models\OrderDetail::where('product_id', $product)->get();
                                            $sumEarned = 0;
                                        @endphp
                                        @foreach($countSum as $count)
                                            @php
                                            $sumEarned = $sumEarned + $count->price*$count->quantity;
                                            @endphp
                                        @endforeach
                                        <tr order-count="{{ $countOrder }}">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="{{ URL::asset('backend/assets/images/products/img-1.png') }}" alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div>
                                                        <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">{{$prod->name}}</a></h5>
                                                        <span class="text-muted">{{$prod->created_at}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">ALL {{$count->price}}</h5>
                                                <span class="text-muted">Çmimi</span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">{{ $countOrder }}</h5>
                                                <span class="text-muted">Porositë</span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">{{ $prod->current_stock }}</h5>
                                                <span class="text-muted">Stoku</span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">ALL {{ $sumEarned }}</h5>
                                                <span class="text-muted">Shuma e fituar</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Shitjet e fundit</h4>
                            <div class="flex-shrink-0">
                                <a class="text-reset" href="{{ route('app.orders.index') }}">
                                    <span class="text-muted">Të gjitha<i class="mdi mdi-chevron-right ms-1"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                    <thead>
                                        <th>Emri Porositesit</th>
                                        <th>Qyteti</th>
                                        <th>Totali produkteve</th>
                                        <th>Lloji i Klientit</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->take(10) as $order)
                                        <tr>
                                            <td>
                                                
                                                <div class="d-flex align-items-center">
                                                <p class="mb-0">{{ $order->name }}</p>
                                                  
                                                </div>
                                                <span>{{ $order->order_code }}</span>
                                            </td>
                                            <td>
                                                <span class="mb-0">{{ $order->city->name }}</span>
                                            </td>
                                            <td>
                                                @php
                                                    $ordersCount = \App\Models\OrderDetail::where('order_id', $order->id)->pluck('quantity');
                                                @endphp
                                                @if($ordersCount)
                                                @php
                                                    $qty = 0;
                                                    foreach($ordersCount as $orderCount) {
                                                        $qty = $qty + $orderCount;
                                                    }
                                                @endphp
                                                @endif
                                                <p class="mb-0">{{ $qty }}</p> 
                                            </td>
                                            <td>
                                                @if($order->customer_id)       
                                                <span class="text-muted">Klient Web</span>
                                                @else
                                                <span class="text-muted">Klient CMS</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card card-height-100">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Store Visits by Source</h4>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown card-header-dropdown">
                                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Shkarko Report</a>
                                                            <a class="dropdown-item" href="#">Eksporto</a>
                                                            <a class="dropdown-item" href="#">Importo</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div id="store-visits-source" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                                            </div>
                                        </div> 
                                    </div> 

                                    <div class="col-xl-8">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Porositë e fundit</h4>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-soft-info btn-sm">
                                                        <i class="ri-file-list-3-line align-middle"></i> Gjeneroni raport
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                        <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">Porosi ID</th>
                                                                <th scope="col">Klienti</th>
                                                                <th scope="col">Produkt</th>
                                                                <th scope="col">Shuma</th>
                                                                <th scope="col">Shitësi</th>
                                                                <th scope="col">Statusi</th>
                                                                <th scope="col">Vlerësimi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="{{ URL::asset('backend/assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Alex Smith</div>
                                                                    </div>
                                                                </td>
                                                                <td>Clothes</td>
                                                                <td>
                                                                    <span class="text-success">ALL 109.00</span>
                                                                </td>
                                                                <td>Zoetic Fashion</td>
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paguar</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2111</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="{{ URL::asset('backend/assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Jansh Brown</div>
                                                                    </div>
                                                                </td>
                                                                <td>Kitchen Storage</td>
                                                                <td>
                                                                    <span class="text-success">ALL 149.00</span>
                                                                </td>
                                                                <td>Micro Design</td>
                                                                <td>
                                                                    <span class="badge badge-soft-warning">Në pritje</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 fw-medium mb-0">4.5<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2109</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="{{ URL::asset('backend/assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Ayaan Bowen</div>
                                                                    </div>
                                                                </td>
                                                                <td>Bike Accessories</td>
                                                                <td>
                                                                    <span class="text-success">ALL 215.00</span>
                                                                </td>
                                                                <td>Nesta Technologies</td>
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paguar</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 fw-medium mb-0">4.9<span class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2108</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="{{ URL::asset('backend/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Prezy Mark</div>
                                                                    </div>
                                                                </td>
                                                                <td>Furniture</td>
                                                                <td>
                                                                    <span class="text-success">ALL 199.00</span>
                                                                </td>
                                                                <td>Syntyce Solutions</td>
                                                                <td>
                                                                    <span class="badge badge-soft-danger">Pa paguar</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 fw-medium mb-0">4.3<span class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2107</a>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0 me-2">
                                                                            <img src="{{ URL::asset('backend/assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                                        </div>
                                                                        <div class="flex-grow-1">Vihan Hudda</div>
                                                                    </div>
                                                                </td>
                                                                <td>Bags and Wallets</td>
                                                                <td>
                                                                    <span class="text-success">ALL 330.00</span>
                                                                </td>
                                                                <td>iTest Factory</td>
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paguar</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 fw-medium mb-0">4.7<span class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 

            </div>  
    </div> -->

    
</div>
@endsection
