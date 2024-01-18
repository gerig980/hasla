@extends('layouts.backend.app') 
@push('css')
 <!-- Plugins css -->
 <link rel="stylesheet" href="{{URL::asset('backend/assets/libs/dropzone/dropzone.css')}}" type="text/css" />
 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <style>
    hr:not([size]) {
        height: 2px;
    }
    .button-delete {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .sizeGuide-img {
        width: 20%;
        max-height: 153px;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Ndrysho guidë përmasash</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('size-guides.index') }}">Guida e përmasave</a></li>
                    <li class="breadcrumb-item active">Ndrysho guidë përmasash</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{ route('size-guides.update', $sizeGuide->id) }}" method="POST" id="createproduct-form"  autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Emri<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ $sizeGuide->title }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="formFile">Ndrysho foton</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                        <div class="mt-1 text-center">
                            <img class="sizeGuide-img" src="{{ URL::asset('backend/assets/images/products/size-guides/'.$sizeGuide->image.'') }}" alt="Foto Size Guide">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div>
                        <label>Përshkrimi<span class="text-danger">*</span></label>
                        <textarea name="description" id="ckeditor-classic">{{ $sizeGuide->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                         @if($sizeGuide->type == 'tops')
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#add-tops" role="tab">
                               Tops
                            </a>
                        </li>
                        @elseif($sizeGuide->type == 'bottoms')
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#add-bottoms" role="tab">
                                Bottoms
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#add-shoes" role="tab">
                                Shoes & Accessories
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <div class="tab-content">
                        @if($sizeGuide->type == 'tops') 
                        <div class="tab-pane active" id="add-tops" role="tabpanel">
                            <div class="row">
                                <div class="mb-3 text-end">
                                    <a id="addTopsSize" class="btn btn-sm py-2 btn-success btn-label waves-effect waves-light addTopsSize"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Shto Masë</a>
                                </div>
                            </div>
                            <div class="row addMoreProductTops">
                            @foreach ($sizeGuide->size_guide_value as $size_guide_val)
                            @if (!empty($size_guide_val))
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="size[]">Masa</label>
                                        <input type="text" class="form-control @error('size[]') is-invalid @enderror" id="size" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="{{ $size_guide_val->size }}" readonly>
                                        @error('size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size[]">Shteti referues</label>
                                            @foreach ($country_size as $size)
                                            <input type="text" class="form-control" id="country_size" name="country_size[]" value="{{ $size }}" readonly multiple>
                                            @endforeach
                                        @error('country_size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>
                                        <input type="number" class="form-control @error('country_size_value[]') is-invalid @enderror" id="country_size_value" name="country_size_value[]" placeholder="Në cm" multiple value="{{ $size_guide_val->country_size_value }}" readonly>
                                        @error('country_size_value[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="shoulder[]">Shpatullat</label>
                                        <div class="input-group has-validation mb-3">
                                            <input type="text" class="form-control @error('shoulder[]') is-invalid @enderror" id="shoulder" name="shoulder[]" multiple  value="{{ $size_guide_val->shoulder }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('shoulder[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="length_tops[]">Gjatësia - Tops</label>
                                        <div class="input-group has-validation mb-3">
                                            <input type="text" class="form-control @error('length_tops[]') is-invalid @enderror" id="length_tops[]" name="length_tops[]" multiple value="{{ $size_guide_val->length_tops }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('length_tops[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sleeve_length[]">Gjatësia e mëngeve</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('sleeve_length[]') is-invalid @enderror" id="sleeve_length" name="sleeve_length[]" multiple value="{{ $size_guide_val->sleeve_length }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('sleeve_length[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bust[]">Busti</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('bust[]') is-invalid @enderror" id="bust" name="bust[]" multiple value="{{ $size_guide_val->bust }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('bust')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 button-delete">
                                    <div class="text-center">
                                        <a href="javascript:void(0);" 
                                            record="sizeGuideValue"
                                            title="Delete Variant Image"
                                            class="btn btn-sm btn-danger confirmDelete"
                                            recordId="{{$size_guide_val->id}}">Fshij</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab-pane -->
                        @elseif($sizeGuide->type == 'bottoms')
                        <div class="tab-pane active" id="add-bottoms" role="tabpanel">
                            <div class="row">
                                <div class="mb-3 text-end">
                                    <a id="addTopsSize" class="btn btn-sm py-2 btn-success btn-label waves-effect waves-light addTopsSize"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Shto Masë</a>
                                </div>
                            </div>
                            <div class="row addMoreProductBottoms">
                            @if($sizeGuide->size_guide_value)
                            @foreach ($sizeGuide->size_guide_value as $size_guide_val)
                            @if (!empty($size_guide_val))
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="size[]">Masa</label>
                                        <input type="text" class="form-control @error('size[]') is-invalid @enderror" id="size" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="{{ $size_guide_val->size }}" readonly>
                                        @error('size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size[]">Shteti referues</label>
                                            @foreach ($country_size as $size)
                                            <input type="text" class="form-control" id="country_size" name="country_size[]" value="{{ $size }}" readonly multiple>
                                            @endforeach
                                        @error('country_size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>
                                        <input type="number" class="form-control @error('country_size_value[]') is-invalid @enderror" id="country_size_value" name="country_size_value[]" placeholder="Në cm" multiple value="{{ $size_guide_val->country_size_value }}" readonly>
                                        @error('country_size_value[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="length_bottoms[]">Gjatësia - Bottoms</label>
                                        <div class="input-group has-validation mb-3">
                                            <input type="text" class="form-control @error('length_bottoms[]') is-invalid @enderror" id="length_bottoms[]" name="length_bottoms[]" multiple value="{{ $size_guide_val->length_bottoms }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('length_bottoms[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="waist_size[]">Gjërësia e belit</label>
                                        <div class="input-group has-validation mb-3">
                                            <input type="text" class="form-control @error('waist_size[]') is-invalid @enderror" id="waist_size[]" name="waist_size[]" multiple value="{{ $size_guide_val->waist_size }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('waist_size[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="hip_size[]">Gjërësia e ijeve</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('hip_size[]') is-invalid @enderror" id="hip_size[]" name="hip_size[]" multiple value="{{ $size_guide_val->hip_size }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('hip_size[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="thigh[]">Gjërësia e kofshëve</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('thigh[]') is-invalid @enderror" id="thigh[]" name="thigh[]" multiple value="{{ $size_guide_val->thigh }}" readonly>
                                            <span class="input-group-text">cm</span>
                                            @error('thigh[]')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 button-delete">
                                    <div class="text-center">
                                        <a href="javascript:void(0);" 
                                            record="sizeGuideValue"
                                            title="Delete Variant Image"
                                            class="btn btn-sm btn-danger confirmDelete"
                                            recordId="{{$size_guide_val->id}}">Fshij</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                                <!-- end col -->
                            </div>
                        </div>
                        @else
                        <!-- end tab-pane -->
                        <div class="tab-pane active" id="add-shoes" role="tabpanel">
                            <div class="row">
                                <div class="mb-3 text-end">
                                    <a id="addTopsSize" class="btn btn-sm py-2 btn-success btn-label waves-effect waves-light addTopsSize"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Shto Masë</a>
                                </div>
                            </div>
                            <div class="row addMoreProductShoes">
                            @if($sizeGuide->size_guide_value)
                            @foreach ($sizeGuide->size_guide_value as $size_guide_val)
                            @if (!empty($size_guide_val))
                                <div class="row">
                                    <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="size[]">Masa</label>
                                        <input type="text" class="form-control @error('size[]') is-invalid @enderror" id="size" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="{{ $size_guide_val->size }}" readonly>
                                        @error('size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size[]">Shteti referues</label>
                                            @foreach ($country_size as $size)
                                            <input type="text" class="form-control" id="country_size" name="country_size[]" value="{{ $size }}" readonly multiple>
                                            @endforeach
                                        @error('country_size[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>
                                        <input type="number" class="form-control @error('country_size_value[]') is-invalid @enderror" id="country_size_value" name="country_size_value[]" placeholder="Në cm" multiple value="{{ $size_guide_val->country_size_value }}" readonly>
                                        @error('country_size_value[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="crown[]">Gjërësia (Kapelet)</label>
                                            <div class="input-group has-validation mb-3">
                                                <input type="text" class="form-control @error('crown[]') is-invalid @enderror" id="crown[]" name="crown[]" multiple value="{{ $size_guide_val->crown }}" readonly>
                                                <span class="input-group-text">cm</span>
                                                @error('crown[]')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="shoes_inner_length[]">Gjatësia e shputës të këmbës</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control @error('shoes_inner_length[]') is-invalid @enderror" id="shoes_inner_length[]" name="shoes_inner_length[]" multiple value="{{ $size_guide_val->shoes_inner_length }}" readonly>
                                                <span class="input-group-text">cm</span>
                                                @error('shoes_inner_length[]')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="platform_length[]">Gjatësia e shuallit të këpuces</label>
                                            <div class="input-group has-validation mb-3">
                                                <input type="text" class="form-control @error('platform_length[]') is-invalid @enderror" id="platform_length[]" name="platform_length[]" multiple value="{{ $size_guide_val->platform_length }}" readonly>
                                                <span class="input-group-text">cm</span>
                                                @error('platform_length[]')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-1 button-delete">
                                        <div class="text-center">
                                            <a href="javascript:void(0);" 
                                            record="sizeGuideValue"
                                            title="Delete Variant Image"
                                            class="btn btn-sm btn-danger confirmDelete"
                                            recordId="{{$size_guide_val->id}}">Fshij</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            </div>
                            <!-- end row -->
                        </div>
                        @endif
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
            </div><!-- end card -->

            <div class="mb-4">
                <button type="submit" class="btn btn-success w-sm">Ruaj</button>
                <a href="{{ route('size-guides.index') }}" class="btn btn-danger ms-1">Anullo</a>
            </div>
        </div>
    </div>
    <!-- end row -->
</form>

@endsection
@push('js')
<!-- ckeditor -->
<script src="{{URL::asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

<!-- dropzone js -->
<script src="{{URL::asset('backend/assets/libs/dropzone/dropzone-min.js')}}"></script>
<script src="{{URL::asset('backend/assets/js/pages/ecommerce-product-create.init.js')}}"></script>

<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{URL::asset('backend/assets/js/pages/select2.init.js')}}"></script>

<script>
    $('.addTopsSize').on('click', function(){
        var numberofrow = ($('.addMoreProductTops').length - 0) + 1;
        var tr = '<div class="row mt-3">'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="size[]">Masa</label>'+
                        '<input type="text" class="form-control @error("size[]") is-invalid @enderror" id="size[]" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="">'+
                        '@error("size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="country_size[]">Shteti referues</label>'+
                            '@foreach ($country_size as $size)'+
                            '<input type="text" class="form-control" id="country_size[]" name="country_size[]" value="{{ $size }}" disabled multiple>'+
                            '@endforeach'+
                        '@error("country_size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                    '<label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>'+
                        '<input type="number" class="form-control @error("country_size_value[]") is-invalid @enderror" id="country_size_value[]" name="country_size_value[]" placeholder="Në cm" multiple value="">'+
                        '@error("country_size_value[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="shoulder[]">Shpatullat</label>'+
                        '<div class="input-group has-validation mb-3">'+
                            '<input type="text" class="form-control @error("shoulder[]") is-invalid @enderror" id="shoulder[]" name="shoulder[]" multiple value="">'+
                            '<span class="input-group-text">cm</span>'+
                            '@error("shoulder[]")'+
                                '<div class="invalid-feedback">{{ $message }}</div>'+
                            '@enderror'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="length_tops[]">Gjatësia - Tops</label>'+
                        '<div class="input-group has-validation mb-3">'+
                            '<input type="text" class="form-control @error("length_tops[]") is-invalid @enderror" id="length_tops[]" name="length_tops[]" multiple value="">'+
                            '<span class="input-group-text">cm</span>'+
                            '@error("length_tops[]")'+
                                '<div class="invalid-feedback">{{ $message }}</div>'+
                            '@enderror'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="sleeve_length[]">Gjatësia e mëngeve</label>'+
                        '<div class="input-group mb-3">'+
                            '<input type="text" class="form-control @error("sleeve_length[]") is-invalid @enderror" id="sleeve_length[]" name="sleeve_length[]" multiple value="">'+
                            '<span class="input-group-text">cm</span>'+
                            '@error("sleeve_length[]")'+
                                '<div class="invalid-feedback">{{ $message }}</div>'+
                            '@enderror'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="bust[]">Busti</label>'+
                        '<div class="input-group mb-3">'+
                            '<input type="text" class="form-control @error("bust[]") is-invalid @enderror" id="bust[]" name="bust[]" multiple value="">'+
                            '<span class="input-group-text">cm</span>'+
                            '@error("bust[]")'+
                                '<div class="invalid-feedback">{{ $message }}</div>'+
                            '@enderror'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1 button-delete">'+
                    '<div class="text-center">'+
                        '<button class="btn btn-sm btn-danger deleteTops">Fshij</button>'+
                    '</div>'+
                '</div>'+
                '</div>';
        $('.addMoreProductTops').append(tr);


        var numberofrow = ($('.addMoreProductBottoms').length - 0) + 1;
        var tr = '<div class="row mt-3">'+
        '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="size[]">Masa</label>'+
                        '<input type="text" class="form-control @error("size[]") is-invalid @enderror" id="size[]" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="">'+
                        '@error("size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="country_size[]">Shteti referues</label>'+
                            '@foreach ($country_size as $size)'+
                            '<input type="text" class="form-control" id="country_size[]" name="country_size[]" value="{{ $size }}" disabled multiple>'+
                            '@endforeach'+
                        '@error("country_size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                    '<label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>'+
                        '<input type="number" class="form-control @error("country_size_value[]") is-invalid @enderror" id="country_size_value[]" name="country_size_value[]" placeholder="Në cm" multiple value="">'+
                        '@error("country_size_value[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+             
                        '<label class="form-label" for="length_bottoms[]">Gjatësia - Bottoms</label>'+
                        '<div class="input-group has-validation mb-3">'+
                            '<input type="text" class="form-control @error("length_bottoms[]") is-invalid @enderror" id="length_bottoms[]" name="length_bottoms[]" multiple value="">'+
                            '<span class="input-group-text">cm</span>'+
                            '@error("length_bottoms[]")'+
                                '<div class="invalid-feedback">{{ $message }}</div>'+
                            '@enderror'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="waist_size[]">Gjërësia e belit</label>'+
                            '<div class="input-group has-validation mb-3">'+
                                '<input type="text" class="form-control @error("waist_size[]") is-invalid @enderror" id="waist_size[]" name="waist_size[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("waist_size[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                               '@enderror'+
                            '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="hip_size[]">Gjërësia e ijeve</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="text" class="form-control @error("hip_size[]") is-invalid @enderror" id="hip_size[]" name="hip_size[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("hip_size[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                                '@enderror'+
                            '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-2 col-sm-6">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="thigh[]">Gjërësia e kofshëve</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="text" class="form-control @error("thigh[]") is-invalid @enderror" id="thigh[]" name="thigh[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("thigh[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                                '@enderror'+
                            '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1 button-delete">'+
                    '<div class="text-center">'+
                        '<button class="btn btn-sm btn-danger deleteTops">Fshij</button>'+
                    '</div>'+
                '</div>'+
                '</div>';
        $('.addMoreProductBottoms').append(tr);


        var numberofrow = ($('.addMoreProductShoes').length - 0) + 1;
        var tr = '<div class="row mt-3">'+
        '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="size[]">Masa</label>'+
                        '<input type="text" class="form-control @error("size[]") is-invalid @enderror" id="size[]" name="size[]" placeholder="S,M,L,XL,XXl" multiple value="">'+
                        '@error("size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                        '<label class="form-label" for="country_size[]">Shteti referues</label>'+
                            '@foreach ($country_size as $size)'+
                            '<input type="text" class="form-control" id="country_size[]" name="country_size[]" value="{{ $size }}" disabled multiple>'+
                            '@endforeach'+
                        '@error("country_size[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-lg-1">'+
                    '<div class="mb-3">'+
                    '<label class="form-label" for="country_size_value[]">Vl. sipas shtetit</label>'+
                        '<input type="number" class="form-control @error("country_size_value[]") is-invalid @enderror" id="country_size_value[]" name="country_size_value[]" placeholder="Në cm" multiple value="">'+
                        '@error("country_size_value[]")'+
                            '<div class="invalid-feedback">{{ $message }}</div>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                    '<div class="col-lg-2 col-sm-6">'+
                        '<div class="mb-3">'+
                            '<label class="form-label" for="crown[]">Koka (Kapelet)</label>'+
                            '<div class="input-group has-validation mb-3">'+
                                '<input type="text" class="form-control @error("crown[]") is-invalid @enderror" id="crown[]" name="crown[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("crown[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                                '@enderror'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-3 col-sm-6">'+
                        '<div class="mb-3">'+
                            '<label class="form-label" for="shoes_inner_length[]">Gjatësia e shputës të këmbës</label>'+
                            '<div class="input-group mb-3">'+
                                '<input type="text" class="form-control @error("shoes_inner_length[]") is-invalid @enderror" id="shoes_inner_length[]" name="shoes_inner_length[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("shoes_inner_length[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                                '@enderror'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-3 col-sm-6">'+
                        '<div class="mb-3">'+
                            '<label class="form-label" for="platform_length[]">Gjatësia e shuallit të këpuces</label>'+
                            '<div class="input-group has-validation mb-3">'+
                                '<input type="text" class="form-control @error("platform_length[]") is-invalid @enderror" id="platform_length[]" name="platform_length[]" multiple value="">'+
                                '<span class="input-group-text">cm</span>'+
                                '@error("platform_length[]")'+
                                    '<div class="invalid-feedback">{{ $message }}</div>'+
                                '@enderror'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-1 button-delete">'+
                        '<div class="text-center">'+
                            '<button class="btn btn-sm btn-danger deleteTops">Fshij</button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        $('.addMoreProductShoes').append(tr);
    });

    $('.addMoreProductTops').delegate('.deleteTops', 'click', function(){
        $(this).parent().parent().parent().remove();
    });
    $('.addMoreProductBottoms').delegate('.deleteTops', 'click', function(){
        $(this).parent().parent().parent().remove();
    });
    $('.addMoreProductShoes').delegate('.deleteTops', 'click', function(){
        $(this).parent().parent().parent().remove();
    });
</script>
<script>
    //Confirm Delete with Sweet Alert
    $(".confirmDelete").click(function(){
        var APP_URL = {!! json_encode(url('/app')) !!}
        var record = $(this).attr("record");
        var recordId = $(this).attr("recordId");
        Swal.fire({
            title: 'Jeni të sigurt që doni ta fshini postimin?',
            text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Po, fshije postimin!',
            cancelButtonText: 'Anullo'
        }).then((result) => {
            if(result.value){
                window.location.href=APP_URL+"/sizeGuides/delete-"+record+"/"+recordId;
            }
        });
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
