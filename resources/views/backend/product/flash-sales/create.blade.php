@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
<style>
    .input-group-text{
        height: 42px;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">{{ __('Krijo Flash Sale') }}</h4>
          <div class="page-title-right">
             <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('app.product.index') }}">{{ __('Lista e Flash Sale') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Krijo Flash Sale') }}</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
<!-- end page title -->

    <div class="row">
        <div class="col-xl-8 offset-2">
            <div class="card">
                <div class="card-body checkout-tab">
                    <form method="POST" action="{{ route('flash-sale.store') }}" enctype="multipart/form-data" id="campaign-create">
                        @csrf
                        @method('POST')
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="true">
                                        <i class="ri-speed-mini-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Flash Sale Info
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3" id="pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false">
                                        <i class="ri-align-justify fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Produktet Flash Sale
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">{{__('Informacione Flash Sale')}}</h5>
                                    <p class="text-muted mb-4">{{__('Përmbush të dhënat përkatëse të Flash Sale')}}</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">{{__('Titulli')}}</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Vendos titullin e flash sale')}}" value="{{ old('title')  }}" required>
                                                @if ($errors->has('title'))
                                                    <div class="invalid-feedback">
                                                        <p>{{ $errors->first('title') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">{{__('Slug')}}</label>
                                                <input type="text" class="form-control" name="slug" id="slug" placeholder="{{__('Vendos slugun e flash sale')}}" value="{{ old('slug')  }}" required>
                                                @if ($errors->has('slug'))
                                                    <div class="invalid-feedback">
                                                        <p>{{ $errors->first('slug') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="billinginfo-address" class="form-label">{{__('Përshkrim i shkurtër')}}</label>
                                        <textarea class="form-control" id="billinginfo-address" placeholder="Vendos një përshkrim të shkurtër në lidhje me flash sale" rows="3"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">{{__('Ngjyra e background')}}</label>
                                                <div class="input-group colorpickerinput">
                                                    <input type="text" class="form-control" name="background_color" value="{{old('background_color')}}" id="background_color" placeholder="{{ __('Vendos ngjyrën e background') }}">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class='bx bxs-color-fill' ></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">{{__('Ngjyra e tekstit')}}</label>
                                                <div class="input-group colorpickerinput">
                                                    <input type="text" class="form-control" name="text_color" value="{{old('text_color')}}" id="background_color" placeholder="{{ __('Vendos ngjyrën e tekstit') }}">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class='bx bxs-color-fill' ></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="date">{{ __('Periudha Kohore') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bx bx-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" value="{{ old('date') }}" name="date" id="date"
                                                   placeholder="{{ __('Vendos periudhën kohore që do të zgjasë flash sale') }}"
                                                   class="form-control daterange-cus" required>
                                        </div>
                                        @if ($errors->has('date'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('date') }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="date">{{ __('Foto') }}</label>
                                        <div class="input-group">
                                            <input type="file" name="thumbnail" class="form-control"  value="{{ old('thumbnail')}}" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                        </div>
                                        <p class="text-muted">{{__('Përdorni madhësine 374x374')}}</p>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="date">{{ __('Foto Baneri') }}</label>
                                        <div class="input-group">
                                            <input type="file" name="banner" class="form-control" value="{{ old('banner')}}" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                        </div>
                                        <p class="text-muted">{{__('Përdorni madhësine 1920X412')}}</p>
                                    </div>

                                    <div class="form-row" style="display: flex">
                                        <div class="form-group col-md-2 mb-4">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="file-input-showcode" class="form-label">{{ __("Featured") }}</label>
                                                <input value="1" name="featured"
                                                    {{ old('featured') == 1 ? 'checked' : '' }} 
                                                    class="form-check-input code-switcher" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="file-input-showcode" class="form-label">{{ __("Status") }}</label>
                                                <input value="1" name="status"
                                                    {{ old('status') == 1 ? 'checked' : '' }} 
                                                    class="form-check-input code-switcher" type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="tab-pane fade" id="pills-bill-address" role="tabpanel" aria-labelledby="pills-bill-address-tab">
                                <div>
                                    <h5 class="mb-1">Produktet e Flash Sale</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                {{-- <div class="mt-4">
                                    <div class="form-group">
                                        <label for="product_id">{{ __('Produktet') }}</label>
                                        <select class="js-example-basic-single product-by-ajax form-control select2" data-toggle="select2" name="product_id[]" id ="product_id" multiple="multiple" aria-hidden="true"
                                                data-url="{{ route('show-div-ajax', ['page_name' => 'campaign-product-div']) }}"></select>
                                        @if ($errors->has('product_id'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('product_id') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div id="div-content">
        
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label" for="products">{{ __('Produktet')}}</label>
                                    <div class="col-sm-12">
                                        <select name="product_id[]" id="products" class="js-example-basic-single form-control select2" multiple required data-title="{{ __('Zgjidh Produktet') }}" data-selected-text-format="count" data-live-search="true">
                                            @foreach(\App\Models\Product::where('status',1)->latest()->get() as $product)
                                            
                                            @if(count($product->stock) != 0)
                                                    <optgroup label="{{ $product->name }}">
                                                        @foreach ($product->stock as $product_stock)
                                                        <option value="{{$product->id}}-{{ $product_stock->id }}">&nbsp; &nbsp; {{ $product_stock->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <option value="{{$product->id}}">{{ $product->name }}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group row" id="discount_table">

                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab" data-previous="pills-bill-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Kthehu tek Flash Sale Info</button>
                                    <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab" data-nexttab="pills-payment-tab"><i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>Ruaj</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ajax-div-load.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('.daterange-cus').daterangepicker({
            autoUpdateInput: false,
            timePicker: true,
            minDate: moment(),
            locale: {
                cancelLabel: '{{ __('Clear') }}',
                format: 'M-DD-YYYY hh:mm A'
            }
        });
        $('.daterange-cus').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YYYY hh:mm A') + ' - ' + picker.endDate.format('MM-DD-YYYY hh:mm A'));
        });
        $('.daterange-cus').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#products').on('change click', function(){
            var product_ids = $('#products').val();
            if(product_ids.length > 0){
                $.post('{{ route('flash-sale.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                    $('#discount_table').html(data);
                });
            }
            else{
                $('#discount_table').html(null);
            }
        });
    });

    $(document).ready(function(){
        $('#products').on('click', function(){

        });
    });
</script>
@endpush





















{{--@extends('layouts.backend.app')
@push('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice,
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            background: #0ab39c;
            border: 1px solid #0ab39c;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }

        .imgProduct {
            max-width: 63%;
            max-height: 104px;
            object-fit: fill;
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
                        <li class="breadcrumb-item"><a href="{{ route('flash-sales.index') }}">Shitjet Flash</a></li>
                        <li class="breadcrumb-item active">Krijo Shitje Flash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('flash-sales.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Krijo Shitje Flash</h5>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="row gy-4 mb-5">
                            <div class="col-6">
                                <label for="title" class="form-label">Titulli<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Titulli..." name="title" value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="url" class="form-label">Url Link<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                                    placeholder="https://" name="url" value="{{ old('url') }}" required>
                                @error('url')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="start_date">Data e fillimit<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="end_date">Data e mbarimit<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="banner" class="form-label">Baneri (1920 x 530)<span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('banner') is-invalid @enderror"
                                    id="banner" name="banner" required>
                                @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="banner_type" class="form-label">Lloji i banerit<span
                                        class="text-danger">*</span></label>
                                <select class="js-example-basic-multiple" name="banner_type" required>
                                    <option value="">Zgjidh...</option>
                                    <option value="full">I plotë</option>
                                    <option value="half">Gjysëm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Zgjidh produkt</h5>
                    </div>
                    <div class="card-body">

                        <div class="row mt-4">
                            <div class="col-6">
                                <label for="products" class="form-label">Produkti<span class="text-danger">*</span></label>
                                <select class="js-example-basic-single products" id="products" name="products1">
                                    <option value="">Zgjidh...</option>
                                    @foreach ($products as $product)
                                        <option data-name="{{ $product->name }}" value="{{ $product->id }}">
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-2">
                                <label for="price" class="form-label">Çmimi</label>
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div> --}}
                            {{-- <input type="hidden" class="form-control" id="price" name="price">
                            <input type="hidden" class="form-control" id="thumbnail" name="thumbnail"> --}}
                            {{-- <div class="col-3">
                                <label for="discount" class="form-label">Zbritja<span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                    id="discount" name="discount1">
                                @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            {{-- <div class="col-2">
                                <label for="discount_type" class="form-label">Tipi i zbritjes<span
                                        class="text-danger">*</span></label>
                                <select class="js-example-basic-single" name="discount_type1" id="discount_type">
                                    <option value="">Zgjidh...</option>
                                    <option value="flat">Fikse</option>
                                    <option value="percent">Përqindje</option>
                                </select>
                            </div> --}}
                            {{-- <div class="col-2">
                                <button type="button" class="btn btn-success waves-effect waves-light mt-4 ms-4 add_more"
                                    id="btn-add">Shto</button>
                            </div> --}}

                            {{-- <table class="table mt-5">
                                <thead class="table_head">
                                    <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                        <th class="h6">Nr.</th>
                                        <th class="h6">Foto</th>
                                        <th class="h6">Produkti</th>
                                        <th class="h6">Çmimi</th>
                                        <th class="h6">Zbritja</th>
                                        <th class="h6">Tipi i zbritjes</th>
                                        <th class="h6">Veprime</th>
                                    </tr>
                                </thead>
                                <tbody class="itemsTable"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">Ruaj</button>
                                    <a href="{{ route('flash-sales.index') }}" class="btn btn-danger">Anullo</a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection --}}
{{-- 
@push('js')
    <script>
        $(function() {
            $(document).ready(function() {
                $('.table_head').css('display', 'none');
            });

            $('#products').on('change', function() {

                if (jQuery('#products').val().length != 0) {
                    $(document).ready(function() {
                        $('.table_head').css('display', 'revert');
                    });
                    var numberofrow = ($('.itemsTable tr').length - 0) + 1;
                    var count = 0;
                    var _products = $('#products option:selected').attr('data-name');
                    var _product_id = $('select[name="products1"]').val();
                    var _price = $('input[name="price"]').val();
                    var _thumbnail = $('input[name="thumbnail"]').val();
                    // var _discount = $('input[name="discount1"]').val();
                    // var _discount_type = $('select[name="discount_type1"]').val();
                    // if ($('select[name="discount_type1"]').val() == 'flat') {
                    //     var _discount_type1 = 'Fikse';
                    // } else if ($('select[name="discount_type1"]').val() == 'percent') {
                    //     var _discount_type1 = 'Perqindje';
                    // } else {
                    //     var _discount_type1 = '';
                    // }
                    // var _discount_type = $('select[name="discount_type[]"]').val();
                    var image =
                        "{{ URL::asset('backend/assets/images/products/product/thumbnails/') }}" + '/' +
                        _thumbnail;

                    count = count + 1;
                    output = '<tr id="row_' + count + '">';
                    output += '<td>' + numberofrow + '</td>';
                    output += '<td style="width: 17%;"><img src="' + image + '" class="imgProduct"> </td>';
                    output += '<td>' + _products +
                        ' <input type="hidden" name="products[]" id="products' + count +
                        '" class="products" value="' + _product_id + '" /></td>';
                    output += '<td>' + _price +
                        ' <input type="hidden" class="price" name="price[]" id="price' +
                        count + '" value="' + _price + '" /></td>';
                    output +=
                        '<td><input type="number" class="form-control" name="discount[]" id="discount' +
                        count + '" /></td>';
                    output +=
                        ' <td><select class="form-control" name="discount_type[]" id="discount_type' +
                        count + '">';
                    output +=
                        '<option value="">Zgjidh...</option>';
                    output +=
                        '<option value="flat">Fikse</option>';
                    output +=
                        '<option value="percent">Përqindje</option>';
                    output +=
                        '</select></td>';

                    output += '<td><button type="button" title="Delete" id="' + count +
                        '" class="delete btn btn-sm btn-icon btn-active-color-danger delete-item qtyMinus"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path></svg></span></button></td>';
                    output += '</tr>';

                    $('.itemsTable').append(output);
                }

            });
            //empty field
            $('select[name="products1"]').val([]).trigger('change');
            $('#price').val('');
            // $('#discount').val('');
            // $('#discount_type').val('');
        });

        //remove items
        $('.itemsTable').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        });


        //now date for date inputs
        var date = new Date();
        var day = ("0" + date.getDate()).slice(-2);
        var month = ("0" + (date.getMonth() + 1)).slice(-2);
        var today = date.getFullYear() + "-" + (month) + "-" + (day);
        $('#start_date').val(today);


        $(document).ready(function() {
            $('select[name="products1"]').on('change', function() {
                // var img = document.getElementById("product-img");
                var APP_URL = {!! json_encode(url('/app')) !!}
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: APP_URL + '/product-price/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            e = $('input[name="price"]').empty();
                            f = $('input[name="thumbnail"]').empty();
                            $.each(data, function(key, value) {
                                $('input[name="price"]').val(value.price);
                                $('input[name="thumbnail"]').val(value.thumbnail);
                            });
                        }
                    });
                } else {
                    console.log('error');
                }
            });
        });
    </script>
@endpush  --}}