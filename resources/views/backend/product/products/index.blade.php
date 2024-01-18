@extends('layouts.backend.app') 
@push('css')
<style>
    #scroll-horizontal_filter {
        display: none;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{__('Produktet')}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Ecommerce')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Produktet')}}</li>
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
                    <h5 class="card-title mb-0 flex-grow-1">{{__('Historia e Produktit')}}</h5>
                    <div class="flex-shrink-0">
                        <a href="{{route('app.product.create')}}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i>{{__('Shto Produkt')}} </a>
                        <button type="button" class="btn btn-info"><i class="ri-file-download-line align-bottom me-1"></i><a class="text-light" href="{{ route('export-products') }}"> {{__('Export')}}</a></button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import
                          </button>

                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Importo Produktet</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('import-products') }}" method="POST" enctype="multipart/form-data">
                                        @csrf            
                                        <input type="file" name="file" class="form-control">           
                                        <br>           
                                        
                        
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info"><a class="text-light" href="{{ route('export-products-sample') }}"> {{__('Shkarko Shembull')}}</a></button>
                                    <button class="btn btn-success">Import</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                              </div>
                            </div>
                          </div>
                        
                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form action="{{ route('app.product.product-filter') }}">
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-6">
                            <div class="search-box">
                                <input type="search" name="search" class="form-control search" placeholder="{{__('Kërko për emrin e produktit ...')}}">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-3">
                            <div>
                                <input type="date" name="fromDate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="{{__('Përzgjidh datë')}}">
                                
                            </div>
                        </div>

                        <div class="col-xxl-1 col-sm-3">
                            <div>
                                <input type="date" name="toDate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="{{__('Përzgjidh datë')}}">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="status" id="idStatus">
                                    <option value="">{{__('Status')}}</option>
                                    <option value="" selected>{{__('Të gjitha')}}</option>
                                    <option value="published">{{__('Publikuar')}}</option>
                                    <option value="draft">{{__('Draft')}}</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="js-example-basic-single form-control" name="category" data-toggle="select2">
                                    <option value="">Zgjidh Kategorine</option>
                                    @foreach($categories as $single_category)
                                        <option value="{{ $single_category->id }}"> &#9654; {{ $single_category->name }}</option>
                                        @if($single_category->children)
                                        @foreach($single_category->children as $child_first)
                                            @if(!empty($child_first))
                                                <option value="{{ $child_first->id }}"> {{ $single_category->name }} &#9656; {{ $child_first->name }}</option>
                                            @endif
                                            @foreach($child_first->children as $child_second)
                                                @if(!empty($child_second))
                                                    <option value="{{ $child_second->id }}"> {{ $single_category->name }} &#9656; {{ $child_first->name }} &#9656; {{ $child_second->name }}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4">
                            <div>
                                <button type="submit" class="btn btn-primary w-100" name="submit"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    {{__('Filtro')}}
                                </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
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
                            <th>{{ __('#') }}</th>
                            <th>{{__('Produkti')}}</th>
                            <th>{{__('Stoku')}}</th>
                            <th>{{__('Detajet')}}</th>
                            <th>{{__('Porositë')}}</th>
                            <th>{{__('Publikuar')}}</th>
                            <th>{{__('Veprimet')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr id="row_{{$product->id}}">
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                </div>
                            </th>
                             <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                        @if(!empty($product->thumbnail))
                                            <img style="width: 40px;" src="{{ asset('images/admin_products/small/'.$product->thumbnail) }}" alt="{{$product->name}}">
                                        @else
                                            <img style="width: 40px;" src="{{ asset('images/admin_products/small/no-image.png') }}">
                                        @endif
                                    </div>
                                    <div>
                                        <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">{{$product->name}}</a></h5>
                                        <p style="display:none;">{{ $product->sku }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if(!empty($product->stock))
                                @foreach($product->stock as $stock)
                                    <span>{{ $stock->sku != '' ? $stock->sku.': '.$stock->current_stock : $stock->current_stock }}</span>
                                    <br>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <span>{{ __('Cmimi Bazë').': ' .$product->price.' /'.$product->unit }}</span><br>
                                <span>{{ __('Cmimi Total').': '.$product->total_sale }}</span><br>
                            </td>
                            <td>
                                @php
                                   $ordersCount = \App\Models\OrderDetail::where('product_id', $product->id)->pluck('quantity');
                                @endphp
                                @if($ordersCount)
                                @php
                                    $qty = 0;
                                    foreach($ordersCount as $orderCount) {
                                        $qty = $qty + $orderCount;
                                    }
                                @endphp
                                @endif
                                {{ $qty }}
                            </td>
                            
                            <td><span>{{ date('d-m-Y', strtotime($product->created_at)) }}</span></td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="View">
                                        <a href="{{route('app.product.show', $product->id)}}" class="text-primary d-inline-block">
                                            <i class="ri-eye-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <a href="{{ route('app.product.edit', $product->id) }}" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Remove">
                                        <a href="javascript:void(0);" onclick="deleteData({{$product->id}})" class="text-danger d-inline-block remove-item-btn">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                        <form id="delete-form-{{ $product->id }}" method="POST" action="{{route('app.product.status.change', $product->id)}}" style="display:none">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    </li>
                                </ul>
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
            title: 'Doni të fshini këtë Produkt?',
            text: "Ju nuk mund ta ktheni më këtë Produkt!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Fshi!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-'+id).submit();
        }
        })
    }
</script>
@endpush

