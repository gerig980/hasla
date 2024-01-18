@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="h4 mb-0 flex-grow-1">Vlerat e Detajit</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Vlera e Detajit</th>
                                    <th scope="col" style="width: 150px;">Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('filter-attribute-values.update', $filterAttributeValue->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $filterAttributeValue->id }}</a></td>
                                        <td>
                                            <input type="text" name="value" class="fuzzy-search form-control mb-2" value="{{ $filterAttributeValue->value }}" />
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-animation waves-effect waves-light">Back</a>
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