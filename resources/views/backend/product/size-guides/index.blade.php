@extends('layouts.backend.app')
@push('css')
    <style>
        div.dataTables_wrapper div.dataTables_info {
            padding-top: 1.5rem !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            padding-top: 1rem !important;
        }

        .img-sizeguide {
            width: 75%;
            max-height: 302px;
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
                        <li class="breadcrumb-item"><a href="{{ route('size-guides.index') }}">Guida e përmasave</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Guida e përmasave</h4>
                    <a href="{{ route('size-guides.create') }}"
                        class="btn btn-success btn-label waves-effect waves-light"><i
                            class="ri-add-line label-icon align-middle fs-16 me-2"></i> Shto</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Përshkrimi</th>
                                <th scope="col">Shteti Referues</th>
                                <th scope="col">Veprime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$sizeGuides->isEmpty())
                                @foreach ($sizeGuides as $sizeGuide)
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $sizeGuide->id }}</a></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#shiko-foto{{ $sizeGuide->id }}">Shiko foton</button>
                                        </td>
                                        <div id="shiko-foto{{ $sizeGuide->id }}" class="modal fade" tabindex="-1"
                                            aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="text-end mb-4">
                                                            <button type="button" class="btn-close text-end"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div>
                                                            <img class="img-sizeguide"
                                                                src="{{ URL::asset('backend/assets/images/products/size-guides/' . $sizeGuide->image . '') }}"
                                                                alt="Foto Size Guide">
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <td>{{ $sizeGuide->title }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#shiko-pershkrimin{{ $sizeGuide->id }}">Shiko
                                                përshkrimin</button>
                                        </td>
                                        <div id="shiko-pershkrimin{{ $sizeGuide->id }}" class="modal fade" tabindex="-1"
                                            aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="text-end mb-4">
                                                            <button type="button" class="btn-close text-end"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div>
                                                            {!! $sizeGuide->description !!}
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <td>{{ $sizeGuide->country_size }}</td>
                                        <td>
                                            <a href="{{ route('size-guides.edit', $sizeGuide->id) }}"
                                                class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                                    class="ri-edit-line"></i></a>
                                            <button onclick="deleteData({{ $sizeGuide->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $sizeGuide->id }}" method="POST"
                                                action="{{ route('size-guides.destroy', $sizeGuide->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnjë guidë përmasash!</p>
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
