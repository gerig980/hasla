@extends('layouts.backend.app')
@push('css')
    <style>
        div.dataTables_wrapper div.dataTables_info {
            padding-top: 1.5rem !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            padding-top: 1rem !important;
        }
    </style>
@endpush
@section('content')
@if($webCustomer)
<div class="page-content">
    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
            <div class="row g-4">
                
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{ $webCustomer->name }}</h3>
                        
                        
                    </div>
                </div>
                <!--end col-->
                <div class="col-12 col-lg-auto order-last order-lg-0">
                    <div class="row text text-white-50 text-center">
                        <div class="col-lg-6 col-4">
                            <div class="p-2">
                                <h4 class="text-white mb-1">{{ count($orders) }}</h4>
                                <p class="fs-14 mb-0">Totali Porosive</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-4">
                            <div class="p-2">
                                @if($orders)
                                @php
                                    $totali = 0;
                                    foreach($orders as $order) {
                                        $totali = $totali + $order->grant_total;
                                    }
                                @endphp
                                
                                <h4 class="text-white mb-1">{{ $totali }}</h4>
                                <p class="fs-14 mb-0">Totali i Paguar</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex">
                        <!-- Nav tabs -->
                     
                        
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">
                                    
                                    

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Emri i Plote :</th>
                                                            <td class="text-muted">{{ $webCustomer->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">{{ $webCustomer->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $webCustomer->email }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th class="ps-0" scope="row">Dita regjistrimit</th>
                                                            <td class="text-muted">{{ $webCustomer->created_at }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->

                                    
                             </div>
                                <!--end col-->
                                <div class="col-xxl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Adresat</h5>
                                            
                                                
                                                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;" id="swiper-wrapper-fbed103b100e70dcb9" aria-live="polite">
                                                    @if ($customerAddress)
                                                        
                                                    
                                                    @foreach ($customerAddress as $address)
                                                    <div class="swiper-slide swiper-slide-active" style="width: 372px; margin-right: 25px;" role="group" ">
                                                        <div class="card profile-project-card shadow-none profile-project-info mb-0">
                                                            
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                       
                                                                        <h5 class="fs-14 text-truncate mb-1">
                                                                            <a href="#" class="text-dark">{{ $address->cities->name }}</a>
                                                                        </h5>
                                                                        <h5 class="fs-14 text-truncate mb-1">
                                                                            <a href="#" class="text-dark">{{ $address->address }}</a>
                                                                        </h5>
                                                                        
                                                                        
                                                                    </div>
                                                                   
                                                                </div>
                                                                
                                                                
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end slide item -->
                                                    @endforeach
                                                    @endif
                                                </div>

                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    
                                </div>
                                
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="tab-pane active" id="activities" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Historiku Porosive</h5>
                                    @if ($orders)
                                        
           
                                    <div class="acitivity-timeline">
                                        <div class="acitivity-item d-flex">
                                            
                                            @foreach ($orders as $order)
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Emri Porosise: {{ $order->name }}<span class="badge bg-soft-primary text-primary align-middle"></span></h6>
                                                <p class="text-muted mb-1">Cmimi Porosise: {{ $order->grant_total }}</p>
                                                <p class="text-muted ">Dita e Porosise: {{ $order->created_at }}</p>
                                                <a href="{{ url('app/order-preinvoice', $order->order_code) }}">Shiko Detajet</a>
                                                <br/>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end tab-pane-->


                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->
</div><!-- End Page-content -->
@endif

@endsection