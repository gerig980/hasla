@extends('layouts.backend.app') 
@push('css')
<style>
    #scroll-horizontal_filter {
        display: none;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{__('Porositë')}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Paneli')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Porositë')}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
           
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">{{__('Lista e Porosive')}}</h5>
                    <div class="flex-shrink-0">
                        <a href="{{route('app.pos.index')}}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i>{{__('Krijo Porosi')}} </a>
                        <button type="button" class="btn btn-info"><i class="ri-file-download-line align-bottom me-1"></i><a class="text-light" href="{{ route('export-orders') }}"> {{__('Export')}}</a></button>
                    </div>
                </div>
            </div>
             <div class="card-body border border-dashed border-end-0 border-start-0">
                <form action="{{ route('app.orders.order-filter') }}">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-sm-4">
                            <div class="search-box">
                                <input type="search" name="search" class="form-control search" placeholder="{{__('Kërko për porosi ID, emrin e klientit, statusin etj...')}}">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-xxl-1 col-sm-3">
                            <div>
                                <input type="date" name="fromDate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="{{__('Përzgjidh datë')}}">
                            </div>
                        </div>

                        <div class="col-xxl-1 col-sm-3">
                            <div>
                                <input type="date" name="toDate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="{{__('Përzgjidh datë')}}">
                            </div>
                        </div>
                        <div class="col-xxl-2 col-sm-3">
                            <div>
                                <select class="form-control" name="paymentGateaway" id="idStatus">
                                    <option disabled selected>{{__('Menyra e Porosise')}}</option>
                                    <option value="" >{{__('Te Gjitha')}}</option>
                                    <option value="1" >{{__('In House')}}</option>
                                    <option value="2">{{__('Adex')}}</option>
 
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" name="orderStatus" id="idStatus">
                                    <option disabled selected>{{__('Status i Porosise')}}</option>
                                    <option value="" >{{__('Të gjitha')}}</option>
                                    <option value="1">{{__('E Re')}}</option>
                                    <option value="2">{{__('Në Pritje')}}</option>
                                    <option value="3">{{__('E Anulluar')}}</option>
                                    <option value="4">{{__('Në Proçes')}}</option>
                                    <option value="5">{{__('Dorëzuar')}}</option>
                                    <option value="6">{{__('Dërguar')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" name="paymentStatus" id="idStatus">
                                    <option disabled selected>{{__('Status i Pageses')}}</option>
                                    <option value="1" >{{__('E Paguar')}}</option>
                                    <option value="0">{{__('Pa Paguar')}}</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-1 col-sm-4">
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary w-100" > <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    {{__('Filtro')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> 
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead class="text-muted table-light">
                        <tr>
                            <th>{{__('#') }}</th>
                            <th>{{__('Kodi i Porosisë')}}</th>
                            <th>{{__('Klienti')}}</th>
                            <th>{{__('Totali')}}</th>
                            <th>{{__('Metoda e Pagesës')}}</th>
                            <th>{{__('Statusi i Pagesës')}}</th>
                            <th>{{__('Statusi')}}</th>
                            <th>{{__('Data')}}</th>
                            <th>{{__('Veprimet')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr id="row_{{$order->id}}">
                            <td>{{ $loop->iteration }}</td>
                            <td>KF-{{ $order->order_code }}</td>
                            <td><span>{{ $order->name }}</span><br>
                                <span class="badge rounded-pill badge-soft-dark">{{ $order->address }}, {{ $order->city->name }}</span>
                            </td>
                            <td>
                                <span>{{ $order->grant_total }} ALL</span>
                            </td>
                            <td>{{ $order->paymentMethod->name }}</td>
                            <td>
                                @if ($order->payment_status == 1)
                                    <span class="badge rounded-pill badge-soft-success">Paguar</span>
                                @else
                                    <span class="badge rounded-pill badge-soft-danger">Pa Paguar</span>
                                @endif
                            </td>
                            <td>{{ $order->orderStatus->name }}
                                <span style="display:none;">{{ $order->order_status_id }}
                                </span>
                            </td>
                            <td><span>{{ $order->created_at->format('d M, Y') }}<small class="text-muted ms-1">{{ $order->created_at->format('H:i a') }}</small></span></td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="View">
                                        <a href="{{ route('app.orders.show', $order->id) }}" class="text-primary d-inline-block">
                                            <i class="ri-eye-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <!-- <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <a href="#" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li> -->
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end col-->
</div><!--end row-->

@endsection
@push('js')

@endpush

