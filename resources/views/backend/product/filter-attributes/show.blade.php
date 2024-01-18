@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="h4 mb-0 flex-grow-1">Vlerat e Detajit - {{ $filterAttribute->name }}</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Vlera e Detajit</th>
                                        <th scope="col">Detaji</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$filterAttribute->filterAttributeValue->isEmpty())
                                        @foreach ($filterAttribute->filterAttributeValue as $filter_attribute_value)
                                        <tr>
                                            <td class="fw-medium">{{ $loop->iteration }}</td>
                                            <td>{{ $filter_attribute_value->value }}</td>
                                            <td>{{ $filterAttribute->name }}</td>
                                            <td>
                                                <a href="{{route('filter-attribute-values.edit', $filter_attribute_value->id)}}" class="btn btn-sm btn-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                                
                                                <a href="javascript:void(0);" onclick="deleteData({{$filter_attribute_value->id}})" class="btn btn-sm btn-danger btn-animation waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></a>
                                                <form id="delete-form-{{ $filter_attribute_value->id }}" method="POST" action="{{route('filter-attribute-values.destroy', $filter_attribute_value->id)}}" style="display:none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><p class="h5">Nuk gjendet vlerë për detajin - <strong> {{ $filterAttribute->name }} </strong>!</p></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
    </div><!-- end col -->
    
    <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto një vlerë të re për Detajin</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Detaji</p>
                    <input type="text" class="fuzzy-search form-control mb-4" value="{{ $filterAttribute->name }}" readonly/>
                    
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        
                        <form action="{{ route('filter-attribute-values.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            
                            <input type="hidden" name="filter_attribute_id" value="{{ $filterAttribute->id }}"/>
                            <input type="text" name="value" class="fuzzy-search form-control mb-4" placeholder="Emri i Vlerës" required/>
                            <div class="text-end">
                                <input type="submit" class="btn btn-success waves-effect waves-light mt-3" value="Ruaj">
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
<script>
    function deleteData(id)
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-'+id).submit();
        }
        })
    }
</script>
    
@endpush