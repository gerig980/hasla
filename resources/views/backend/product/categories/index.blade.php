@extends('layouts.backend.app') 
 
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panelet</a></li>
                        <li class="breadcrumb-item active">Paneli</li>
                    </ol>
                </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header  border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Historia e Kategorisë</h5>
                    <div class="flex-shrink-0">
                        <a href="{{route('categories.create')}}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Shto Kategori</a>
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
                            <th>Emri</th>
                            <th>Kategoria Prind</th>
                            <th>Ikona</th>
                            <th>Statusi</th>
                            <th>Veprimet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                    </div>
                                </th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @php $parent_category= \App\Models\Category::where('id', $category->parent_id)->first(); @endphp
                                    @if($parent_category != null)
                                        <span class="badge badge-soft-info">{{ $parent_category->name }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($category->icon))
                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                            <img src="{{ asset('backend/assets/images/products/category/icons/'.$category->icon) }}" alt="" class="img-fluid d-block" />
                                        </div>
                                    @else   
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-soft-primary text-primary">
                                                ikona
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($category->status === 1)
                                        <a href="javascript: void(0);" class="updateCategoryStatus" 
                                            id="category-{{$category->id}}" category_id="{{$category->id}}">
                                            <i class="las la-toggle-on" aria-hidden="true" status="Active" style="font-size:30px; color:#45cb85;"></i>
                                        </a>
                                    @else
                                        <a href="javascript: void(0);" class="updateCategoryStatus" 
                                            id="category-{{$category->id}}" category_id="{{$category->id}}">
                                            <i class="las la-toggle-off" aria-hidden="true" status="Inactive" style="font-size:30px; color:#45cb85;"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-soft-warning waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                    
                                    <a href="javascript:void(0);" onclick="deleteData({{$category->id}})" class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></a>
                                    <form id="delete-form-{{ $category->id }}" method="POST" action="{{route('categories.destroy', $category->id)}}" style="display:none">
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
    $(".updateCategoryStatus").click(function(){
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            type:'post',
            url: 'update-category-status',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{status:status, category_id:category_id},

            success:function(resp){
                if(resp['status'] === 0){
                    $("#category-"+category_id).html("<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>");
                }else if(resp['status'] === 1){
                    $("#category-"+category_id).html("<i class='las la-toggle-on' aria-hidden='true' status='Active' style='font-size:30px;color:#45cb85;'></i>");
                }
            },
            error:function(){
                alert("Error");
            }
        });
        
    });
    
    
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