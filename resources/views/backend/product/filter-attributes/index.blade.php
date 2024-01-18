@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="h4 mb-0 flex-grow-1">Detaje rreth Produkteve</h4>
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
                                @if (!$filter_attributes->isEmpty())
                                    @foreach ($filter_attributes as $filter_attribute)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $filter_attribute->name }}</td>
                                            <td style="white-space: unset;">
                                                @foreach ($filter_attribute->filterAttributeValue as $filter_attribute_value)
                                                    @if (!empty($filter_attribute_value))
                                                        <span style="font-size:13px;" class="badge badge-inline badge-md bg-soft-dark text-black p-2">{{ $filter_attribute_value->value }}</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('filter-attributes.show', $filter_attribute->id)}}" class="btn btn-sm btn-success btn-animation waves-effect waves-light"><i class="ri-settings-line"></i></a>
                                                <a href="{{route('filter-attributes.edit', $filter_attribute->id)}}" class="btn btn-sm btn-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                                <a href="javascript:void(0);" onclick="deleteData({{$filter_attribute->id}})" class="btn btn-sm btn-danger btn-animation waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></a>
                                                <form id="delete-form-{{ $filter_attribute->id }}" method="POST" action="{{route('filter-attributes.destroy', $filter_attribute->id)}}" style="display:none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td><p class="h5">Nuk u gjend Detaj!</p></td>
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
                    <h4 class="card-title mb-0">Shto një Detaj</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        
                        <form action="{{ route('filter-attributes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="text" name="name" class="fuzzy-search form-control mb-2" placeholder="Emri i Detajit" />
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