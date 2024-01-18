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

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Rolet dhe permissions</h4>
                    <a href="{{ route('roles.create') }}"
                       class="btn btn-success btn-label waves-effect waves-light"><i
                            class="ri-add-line label-icon align-middle fs-16 me-0"></i> Shto</a>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Roli</th>
                            <th scope="col" style="width: 150px;">Veprime</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td><a href="#" class="fw-medium">{{ $loop->iteration }}</a></td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                            class="ri-edit-line"></i></a>

                                    @if($role->deletable)
                                        <button onclick="deleteData({{ $role->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light">
                                            <i class="ri-delete-bin-5-line"></i>
                                        </button>
                                    @endif
                                    <form id="delete-form-{{ $role->id }}" method="POST"
                                          action="{{ route('roles.destroy', $role->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Jeni të sigurt që doni ta fshini rolin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije rolin!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
