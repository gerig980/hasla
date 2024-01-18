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
                                <th scope="col">Telefon</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Email</th>
                                <th scope="col" style="width: 150px;">Veprime</th>
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
                                            <a  href="{{ route('customer.show', $customer->id) }}" data-bs-target=".bs-example-modal-center-{{ $customer->id }}" class="btn btn-sm btn-soft-primary btn-animation waves-effect waves-light"><i class="ri-eye-fill fs-16"></i></a>
                                            <a  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-{{ $customer->id }}" class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                            <!-- edit customer modal -->
                                            <div class="modal fade bs-example-modal-center-{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Ndrysho Tag</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    
                                                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <p>Emri</p>
                                                            <input type="text" name="name" class="fuzzy-search form-control mb-4" value="{{ $customer->name }}" placeholder="Emri i klientit" required />
                                                            <p>Nr. Telefonit</p>
                                                            <input type="tel" name="phone" class="fuzzy-search form-control mb-4" value="{{ $customer->phone }}" placeholder="Shembull: +355 xx xx xx xxx" required />
                                                            <p>Email</p>
                                                            <input type="email" name="email" class="fuzzy-search form-control mb-4" value="{{ $customer->email }}" placeholder="Email i klientit" />
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Anullo</button>
                                                        </div>
                                                    </form>
                                                    
                                                    </div>
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            
                                            <button onclick="deleteData({{ $customer->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $customer->id }}" method="POST"
                                                action="{{ route('customers.destroy', $customer->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
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

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto klient</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="text" name="name" class="fuzzy-search form-control mb-4" placeholder="Emri i klientit" required />
                            <p>Nr. Telefonit</p>
                            <input type="tel" name="phone" class="fuzzy-search form-control mb-4" placeholder="Shembull: +355 xx xx xx xxx" required />
                            <p>Email</p>
                            <input type="email" name="email" class="fuzzy-search form-control mb-4" placeholder="Email i klientit" />
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