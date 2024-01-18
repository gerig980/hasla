@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="h4 mb-0 flex-grow-1">Detaji</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Emri</th>
                                    <th scope="col">Vlerat</th>
                                    <th scope="col" style="width: 150px;">Veprime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('filter-attributes.update', $filterAttribute->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td><a href="#" class="fw-medium">{{ $filterAttribute->id }}</a></td>
                                        <td>
                                            <input type="text" name="name" class="fuzzy-search form-control mb-2" value="{{ $filterAttribute->name }}" />
                                        </td>
                                        <td>
                                            @foreach ($filterAttribute->filterAttributeValue as $filter_attribute_value)
                                                @if (!empty($filter_attribute_value))
                                                    <span style="font-size:13px;" class="badge badge-inline badge-md bg-soft-dark text-black p-2">{{ $filter_attribute_value->value }}</span>
                                                @endif
                                            @endforeach
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