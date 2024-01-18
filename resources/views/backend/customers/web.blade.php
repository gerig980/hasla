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
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Klientët</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Klientët</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Shiko</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$customers->isEmpty())
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $customer->id }}</a></td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            @if ($customer->activated === 1)
                                                <a href="javascript: void(0);" class="updateCustomerStatus"
                                                    id="customer-{{ $customer->id }}" customer_id="{{ $customer->id }}">
                                                    <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @else
                                                <a href="javascript: void(0);" class="updateCustomerStatus"
                                                    id="customer-{{ $customer->id }}" customer_id="{{ $customer->id }}">
                                                    <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td><a  href="{{ route('customer.showweb', $customer->id) }}" data-bs-target=".bs-example-modal-center-{{ $customer->id }}" class="btn btn-sm btn-soft-primary btn-animation waves-effect waves-light"><i class="ri-eye-fill fs-16"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnje klient!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
@push('js')
    <script type="text/javascript">
    $(".updateCustomerStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var customer_id = $(this).attr("customer_id");
        $.ajax({
            type: 'post',
            url: 'customer-status-change',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                customer_id: customer_id
            },

            success: function(resp) {
                if (resp['status'] === 0) {
                    $("#customer-" + customer_id).html(
                        "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                    );
                } else if (resp['status'] === 1) {
                    $("#customer-" + customer_id).html(
                        "<i class='las la-toggle-on' aria-hidden='true' status='Active' style='font-size:30px;color:#45cb85;'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    </script>
@endpush