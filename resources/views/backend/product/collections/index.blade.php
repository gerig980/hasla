@extends('layouts.backend.app') 
@push('css')

@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Lista e Koleksioneve të Produkteve</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Produktet</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Koleksione Produktesh</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
           
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Historia e Koleksionit të Produkteve</h5>
                    <div class="flex-shrink-0">
                        <a href="{{route('collections.create')}}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Shto Koleksion</a>
                        <button type="button" class="btn btn-info"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>
                            <th>Ikona</th>
                            <th>Emri</th>
                            <th>Slug</th>
                            <th>Statusi</th>
                            <th>Veprimet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                    </div>
                                </th>
                                <td>
                                    @if(!empty($collection->image))
                                        <img src="{{ URL::asset('images/collections/banner/'.$collection->image) }}" width="150px"/>
                                    @else
                                        <img src="{{ URL::asset('backend/assets/images/products/thumbnailKF.png') }}" width="50px"/>
                                    @endif
                                </td>
                                <td>{{ $collection->name }}</td>
                                <td>{{ $collection->slug }}</td>
                                <td>
                                    @if($collection->status === App\Models\Collection::ACTIVE)
                                        <span class="badge bg-success">Aktive</span>
                                    @else
                                        <span class="badge bg-danger">Inaktive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-sm btn-soft-warning waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                    
                                    <a href="javascript:void(0);" onclick="deleteData({{$collection->id}})" class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></a>
                                    <form id="delete-form-{{ $collection->id }}" method="POST" action="{{route('collections.destroy', $collection->id)}}" style="display:none">
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
    </div><!--end col-->
</div><!--end row-->
@endsection
@push('js')
<script type="text/javascript">    
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