@extends('layouts.backend.app')
@push('css')
    <style>
        div.dataTables_wrapper div.dataTables_info {
            padding-top: 1.5rem !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            padding-top: 1rem !important;
        }

        .img-flashSale {
            max-width: 63%;
            max-height: 111px;
            object-fit: fill;
        }
        table.dataTable.nowrap th, table.dataTable.nowrap td {
            white-space: normal !important;
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
                        <li class="breadcrumb-item"><a href="{{ route('flash-sale.index') }}">Shitjet Flash</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Shitjet Flash</h4>
                    <a href="{{ route('flash-sale.create') }}"
                        class="btn btn-success btn-label waves-effect waves-light"><i
                            class="ri-add-line label-icon align-middle fs-16 me-2"></i> Shto</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulli</th>
                                <th scope="col">Baneri</th>
                                {{-- <th scope="col">Lloji i banerit</th> --}}
                                <th scope="col">Data e fillimit</th>
                                <th scope="col">Data e mbarimit</th>
                                <th scope="col">Status</th>
                                <th scope="col">Url Link</th>
                                <th scope="col">Veprime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$flashSales->isEmpty())
                                @foreach ($flashSales as $flashSale)
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $flashSale->id }}</a></td>
                                        <td>{{ $flashSale->title }}</td>
                                        <td style="width: 17%;">
                                        @if($flashSale->banner)
                                            <img class="img-flashSale"
                                                src="{{ URL::asset('images/flash-sales/original/' . $flashSale->banner . '') }}"
                                                alt="Baner flash sale">
                                        @endif
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($flashSale->start_date)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($flashSale->end_date)) }}</td>
                                        <td>
                                            @php
                                                $now = strtotime(\Carbon\Carbon::now());
                                                $start = strtotime($flashSale->start_date);
                                                $end = strtotime($flashSale->end_date);
                                            @endphp
                                            @if($flashSale->status == 1 && $now >= $start && $now <= $end)
                                                <a href="javascript: void(0);" class="updateFlashSaleStatus"
                                                    id="flashSale-{{ $flashSale->id }}" flashSale_id="{{ $flashSale->id }}">
                                                    <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @elseif($flashSale->status == 0 && $now >= $start && $now <= $end)
                                                <a href="javascript: void(0);" class="updateFlashSaleStatus"
                                                    id="flashSale-{{ $flashSale->id }}"
                                                    flashSale_id="{{ $flashSale->id }}">
                                                    <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @else
                                                <a href="javascript: void(0);" class=""
                                                    id="flashSale-{{ $flashSale->id }}"
                                                    flashSale_id="{{ $flashSale->id }}">
                                                    <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>/{{ $flashSale->slug }}</td>
                                        <td>
                                            <a href="{{ route('flash-sale.edit', $flashSale->id) }}"
                                                class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                                    class="ri-edit-line"></i></a>
                                            <button onclick="deleteData({{ $flashSale->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-flashSale-{{ $flashSale->id }}" method="POST"
                                                action="{{ route('flash-sale.delete', $flashSale->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnjë shitje flash!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(".updateFlashSaleStatus").click(function() {
            var status = $(this).children("i").attr("status");
            var flashSale_id = $(this).attr("flashSale_id");
            $.ajax({
                type: 'post',
                url: 'update-flashSale-status',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status,
                    flashSale_id: flashSale_id
                },
                success: function(resp) {
                    if (resp['status'] === 0) {
                        $("#flashSale-" + flashSale_id).html(
                            "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                        );
                    } else if (resp['status'] === 1) {
                        $("#flashSale-" + flashSale_id).html(
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
                title: 'Jeni të sigurt që doni ta fshini Flash Sale?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije Flash Sale!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-flashSale-' + id).submit();
                }
            })
        }
    </script>
@endpush
