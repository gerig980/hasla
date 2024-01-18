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
                        <li class="breadcrumb-item"><a href="{{ route('app.order-statuses.index') }}">Status Për Porositë</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Klientët</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulli i Statusit</th>
                                <th scope="col">Statusi</th>
                                <th scope="col" style="width: 150px;">Veprime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$order_statuses->isEmpty())
                                @foreach ($order_statuses as $orderStatus)
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $orderStatus->id }}</a></td>
                                        <td>{{ $orderStatus->name }}</td>
                                        <td>
                                            @if ($orderStatus->status === 1)
                                                <a href="javascript: void(0);" class="updateOrderSStatus"
                                                    id="orderStatus-{{ $orderStatus->id }}" orderStatus_id="{{ $orderStatus->id }}">
                                                    <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @else
                                                <a href="javascript: void(0);" class="updateOrderSStatus"
                                                    id="orderStatus-{{ $orderStatus->id }}" orderStatus_id="{{ $orderStatus->id }}">
                                                    <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-{{ $orderStatus->id }}" class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                            <!-- edit orderStatus modal -->
                                            <div class="modal fade bs-example-modal-center-{{ $orderStatus->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Ndrysho Status</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('app.order-statuses.update', $orderStatus->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <p>Titulli i Statusit</p>
                                                            <input type="text" name="name" class="fuzzy-search form-control mb-4" value="{{ $orderStatus->name }}" required />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Anullo</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <button onclick="deleteData({{ $orderStatus->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $orderStatus->id }}" method="POST"
                                                action="{{ route('app.order-statuses.destroy', $orderStatus->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk gjendet rekord për statusin!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto Status</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="fuzzysearch-list">
                        <form action="{{ route('app.order-statuses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <p>Titulli i Statusit</p>
                            <input type="text" name="name" class="fuzzy-search form-control mb-4" placeholder="Emri i statusit" required />
                            <div class="text-end">
                                <input type="submit" class="btn btn-success waves-effect waves-light mt-3" name="submit" value="Shto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>

    </div><!-- end row -->
@endsection
@push('js')
    <script type="text/javascript">
    $(".updateOrderSStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var orderStatus_id = $(this).attr("orderStatus_id");
        $.ajax({
            type: 'post',
            url: 'update-order-s-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                orderStatus_id: orderStatus_id
            },

            success: function(resp) {
                if (resp['status'] === 0) {
                    $("#orderStatus-" + orderStatus_id).html(
                        "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                    );
                } else if (resp['status'] === 1) {
                    $("#orderStatus-" + orderStatus_id).html(
                        "<i class='las la-toggle-on' aria-hidden='true' status='Active' style='font-size:30px;color:#45cb85;'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    function deleteData(id) {
        Swal.fire({
            title: 'Jeni të sigurt që doni ta fshini Statusin?',
            text: "Nëse ky rekord do të fshihet atëher ai nuk do kthehet më!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Po, fshije statusin!',
            cancelButtonText: 'Anullo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
    </script>
@endpush