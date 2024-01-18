@extends('layouts.backend.app') 
@push('css')
<!-- Plugins css -->
{{-- <link href="{{URL::asset('backend/assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" /> --}}
<style>
li.product-output {
    list-style: none;
}

li.product-output:hover {
    cursor: pointer;
    background: #eff2f7;

}

.product-output-ul {
    box-shadow: rgba(0, 0, 0, 0.2) 0px 8px 16px 0px;
    height: 185px;
    overflow-y: auto;
}
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
   <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
         <h4 class="mb-sm-0">{{ __('Krijo Produkt') }}</h4>
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">{{ __('Lista e Produkteve') }}</a></li>
               <li class="breadcrumb-item active">{{ __('Krijo Produkt') }}</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- end page title -->
<form action="{{route('collections.update', $collection->id)}}" method="post" enctype="multipart/form-data">
   @method('PUT')
   @csrf
   <div class="row">
      <div class="col-lg-8">
        {{-- collections Information --}}
         <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Informacione rreth Koleksionit') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="collection-title-input">{{__('Emri i Koleksionit')}}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $collection->name ?? old('name') }}"
                                id="collection-title-input" 
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label class="form-label" for="collection-title-input">{{__('Ikona i Koleksionit')}}<span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('icon') is-invalid @enderror" 
                                name="icon" 
                                id="collection-title-input"
                                value="{{ $collection->icon ?? old('icon') }}"
                        >
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        @if(!empty($collection->icon))
                            <img src="{{ asset('images/collections/icon/'.$collection->icon) }}" width="80px">
                        @else
                            <img src="{{ URL::asset('backend/assets/images/products/thumbnailKF.png') }}" width="50px"/>
                        @endif
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label">Përshkrimi i Koleksionit</label>
                        <textarea id="exampleFormControlTextarea5" class="form-control @error('description') is-invalid @enderror" name="description">{{ $collection->description ?? old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    @if($products)
                        @foreach($products as $collectionProduct)
                        <div class="col-3" id="{{ $collectionProduct->id }}">
                            <div class="card card-body">
                                <div class="d-flex mb-4 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/admin_products/small/'.$collectionProduct->thumbnail) }}" alt="" class="avatar-sm rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h5 class="card-title mb-1">{{ $collectionProduct->name }}</h5>
                                        <p class="text-muted mb-0">{{ $collectionProduct->sku }}</p>
                                    </div>
                                </div>
                                <input type="hidden" name="product_ids[]" class="product-input" value="{{ $collectionProduct->id }}">
                                <a class="btn btn-primary btn-sm delete-input" data-id="{{ $collectionProduct->id }}">Fshi nga koleksioni</a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-12">
                    <label>Shto produkte të tjerë</label>
                    <form autocomplete="off" action="#">
                        <div class="dashboard_bar" style="width:100%;">
                            <div class="input-group d-lg-inline-flex d-none">
                                <input id="search" name="search" type="text" class="form-control autocomplete" placeholder="Kërko Produkt...">
                            </div>
                            <div id="tbody" class="autocomplete-list"></div>
                        </div>
                    </form>
                    <div class="row" id="display-product"></div>
                    @error('same_product_id') 
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
         </div><!-- end card -->
         <div class="text-end mb-3">
            <button type="submit" class="btn btn-success w-sm">Ruaj</button>
         </div>
      </div>
      <!-- end col -->
      <div class="col-lg-4">
         <div class="card">
            <div class="card-header">
               <h5 class="card-title mb-0">Publiko</h5>
            </div>
            <div class="card-body">
               <div class="mb-3">
                  <label for="choices-publish-status-input" class="form-label">Statusi<span class="text-danger">*</span></label>
                  <select class="form-select js-example-basic-single @error('status') is-invalid @enderror" name="status" required id="choices-publish-status-input" data-choices data-choices-search-false>
                     <option value="">Zgjidh...</option>
                     @foreach ($status as $c_status)
                        <option value="{{ $c_status }}" @isset($collection->status) {{$collection->status == $c_status ? 'selected' : ''}}  @endisset>{{ $c_status }}</option>
                     @endforeach
                  </select>
                  @error('status')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <!-- end card body -->
         </div> <!-- end card -->
         <div class="card">
            <div class="card-header">
               <h5 class="card-title mb-0">Banneri i Koleksionit</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="collection-title-input">{{__('Foto Baner')}}<span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                            name="image" 
                            id="collection-title-input"
                            value="{{ $collection->image ?? old('image') }}"
                        >
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        @if(!empty($collection->image))
                            <img src="{{ asset('images/collections/banner/'.$collection->image) }}" width="100%">
                        @else
                            <img src="{{ URL::asset('backend/assets/images/products/thumbnailKF.png') }}" width="100px"/>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end card body -->
         </div> <!-- end card -->
      </div>
      <!-- end col -->
   </div>
   <!-- end row -->
</form>
@endsection
@push('js')
<script type="text/javascript">
// search product on keyup
$('#search').on('keyup', function() {
        $value = $(this).val();
        var route = "{{ route('app.product.product-search') }}";
        if ($value != '') {
            $.ajax({
                    type: 'get',
                    url: route,
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#tbody').fadeIn(data);
                        $('#tbody').html(data);
                    }
                }

            );
        }
}); //get the product by search onclick
    var dataArray = [];
    $('.product-input').each(function() {
        var value = $(this).val();
        dataArray.push(parseInt(value));
    });

    $(document).on('click', '.delete-input', function() {
        var id = $(this).attr('data-id');
        if(id) {
            var element = document.getElementById(id);
            element.remove();
            for(var i = 0; i < dataArray.length; i++){
                if (dataArray[i] === parseInt(id)) { 
                    dataArray.splice(i, 1);
                }
            }
        }
    });
$(document).on('click', 'li', function() {
        $('#search').val("");

        var APP_URL = {!! json_encode(url('/app')) !!}

        var id = $(this).attr('id');

        if (id) {
            $.ajax({
                url: APP_URL + '/product-find/' + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                    if(!(dataArray.includes(value.id))) {
                        $('#display-product').append('<div class="col-12 product_' +
                            value.id + '">' +
                            '<input type="hidden" name="product_ids[]" value="' +
                            value.id + '">' +
                            '<span><img src="/images/admin_products/small/' + value
                            .thumbnail +
                            '" style="width:60px; margin-right:6px;margin-top:6px"/>' +
                            value.name + '</span>' +
                            '<a href="javascript:void(0)" id="delete' + value.id +
                            '" style="float:right">' +
                            '<img  class="rotateimg45 mt-4" src="/backend/assets/images/layouts/x.png" style="width:12px;"/>' +
                            '</a></div>');
                        dataArray.push(value.id);
                        $('#delete' + value.id).on('click', function() {
                                $('.product_' + value.id).remove();
                            });
                        } else {
                            alert('Produkti eshte shtuar me pare!');
                        }
                    });
                    },
                });
        } else {
            console.log('error');
        }

        $('#tbody').fadeOut();
    });
    
</script> 
{{-- <script src="{{URL::asset('backend/assets/libs/dropzone/dropzone-min.js')}}"></script> --}}
<script src="{{URL::asset('backend/assets/js/pages/ecommerce-product-create.init.js')}}"></script>
@endpush
