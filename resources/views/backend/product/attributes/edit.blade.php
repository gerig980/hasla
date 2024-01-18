@extends('layouts.backend.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('attributes.index') }}">Atributet</a></li>
                        <li class="breadcrumb-item active">Vlerat</li>
                        <li class="breadcrumb-item active">Ndrysho atribut</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Ndrysho atribut</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Emri</th>
                                        <th scope="col">Vlerat</th>
                                        <th scope="col" style="width: 150px;">Veprime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('attributes.update', $attribute->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <tr>
                                            <td><a href="#" class="fw-medium">{{ $attribute->id }}</a></td>
                                            <td>
                                                <input type="text" name="name" class="fuzzy-search form-control mb-2"
                                                    value="{{ $attribute->name }}" />
                                            </td>
                                            <td>
                                                @foreach ($attribute->attribute_value as $attributevalue)
                                                    @if ($attribute->id == $attributevalue->attribute_id)
                                                        <span style="font-size:13px;"
                                                            class="badge badge-inline badge-md bg-soft-dark text-black p-2">{{ $attributevalue->value }}</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-success waves-effect waves-light"
                                                    value="Ruaj">
                                                <a href="{{ url()->previous() }}"
                                                    class="btn btn-danger btn-animation waves-effect waves-light">Prapa</a>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
