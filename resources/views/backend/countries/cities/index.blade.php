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
                        <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">Shtetet</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('cities.index') }}">Qytetet</a></li>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Qytetet</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Emri</th>
                                <th>Shteti</th>
                                <th>Kosto</th>
                                <th>Statusi</th>
                                <th>Veprimet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$cities->isEmpty())
                                @foreach ($cities as $city)
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $city->id }}</a></td>
                                        <td>{{ $city->name }}</td>
                                        @foreach ($countries as $country)
                                            @if ($country->id == $city->country_id)
                                                <td>{{ $country->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            @if ($city->cost)
                                                {{ $city->cost }}
                                            @else
                                                <p>Nuk ka kosto!</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($city->status === 1)
                                                <a href="javascript: void(0);" class="updateCityStatus"
                                                    id="city-{{ $city->id }}" city_id="{{ $city->id }}">
                                                    <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @else
                                                <a href="javascript: void(0);" class="updateCityStatus"
                                                    id="city-{{ $city->id }}" city_id="{{ $city->id }}">
                                                    <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                                        style="font-size:30px; color:#45cb85;"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('cities.edit', $city->id) }}"
                                                class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                                    class="ri-edit-line"></i></a>
                                            <button onclick="deleteData({{ $city->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $city->id }}" method="POST"
                                                action="{{ route('cities.destroy', $city->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnjë qytet!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto qytet</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="name" class="fuzzy-search form-control mb-4"
                                placeholder="Emri i qytetit" required />
                            <p>Shteti</p>
                            <select name="country_id" class="form-select mb-4" id="choices-publish-status-input"
                                data-choices data-choices-search-false>
                                <option value="">Zgjidh</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <p>Kosto</p>
                            <input type="text" name="cost" class="fuzzy-search form-control mb-4" />
                            <input type="hidden" name="status" class="fuzzy-search form-control mb-4" value="1" />
                            <div class="text-end">
                                <input type="submit" class="btn btn-success waves-effect waves-light mt-3" value="Shto">
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
        $(".updateCityStatus").click(function() {
            var status = $(this).children("i").attr("status");
            var city_id = $(this).attr("city_id");
            $.ajax({
                type: 'post',
                url: 'update-city-status',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status,
                    city_id: city_id
                },

                success: function(resp) {
                    if (resp['status'] === 0) {
                        $("#city-" + city_id).html(
                            "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                        );
                    } else if (resp['status'] === 1) {
                        $("#city-" + city_id).html(
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
                title: 'Jeni të sigurt që doni ta fshini postimin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije postimin!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
