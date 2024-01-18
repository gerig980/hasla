@extends('layouts.backend.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">{{ __('Krijo Baner') }}</h4>
          <div class="page-title-right">
             <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('banners.index') }}">{{ __('Lista e Banerave') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Krijo Baner') }}</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
<div class="row">
    <div class="col-xl-8 offset-2">
        <div class="card">
            <div class="card-header input-title">
                @isset($banner)
                <h4>{{ __('Ndrysho banner')}}</h4>
                @else
                <h4>{{ __('Shto baner te ri')}}</h4>
                @endisset
            </div>
            <div class="card-body card-body-paddding">
                @php
                    $route = isset($banner) ? route('banners.update',$banner->id) : route('banners.store')
                @endphp
                <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                    @csrf
                    @isset($banner)
                        @method('put')
                        <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" name="r">
                    @endisset
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="order">{{ __('Radha') }}</label>
                                <input type="number" class="form-control" name="order" id="order"
                                        value="{{ isset($banner) ? $banner->order : old('order') }}"
                                        placeholder="{{__('Radha')}}">
                                @if ($errors->has('order'))
                                    <div class="invalid-feedback">
                                        <p>{{ $errors->first('order') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="link">{{ __('Link') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">https://klaudiofashion.al/</span>
                                    <input type="text" class="form-control" name="link" id="link"
                                        value="{{ isset($banner) ? $banner->link : old('link') }}"
                                        placeholder="{{__('Link')}}">
                                </div>
                                @if ($errors->has('link'))
                                    <div class="invalid-feedback">
                                        <p>{{ $errors->first('link') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 pt-3">
                            <label for="banner_type">Pozicioni i banerit</label>
                            <div class="input-group">
                                <select class="form-select" id="bannerPosition" name="position">
                                    <option selected disabled>Zgjidhni pozicionin e banerit...</option>
                                    <option value="menu">Baner në menu</option>
                                    <option value="page">Baner në faqe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-3" id="categoryDiv" style="display:none;">
                            <label for="banner_type">Kategoria ku do të shfaqet</label>
                            <div class="input-group">
                                <select class="form-select" id="bannerCategory" name="banner_category">
                                    <option selected disabled>Zgjidhni kategorinë ku do të shfaqet baneri</option>
                                    <option value="" @isset($banner){{ $banner->category_id == 0 ? 'selected' : '' }} @endisset>Të gjitha kategoritë</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @isset($banner){{ $banner->category_id == $category->id ? 'selected' : '' }} @endisset>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-3" id="bannerTypeDiv" style="display:none;">
                            <label for="banner_type">Përmasa e banerit</label>
                            <div class="input-group">
                                <select class="form-select" id="bannerType" name="banner_type">
                                    <option selected="">Zgjidhni tipin e banerit...</option>
                                    @foreach ($banner_types as $banner_type)
                                        @if($banner_type == 'col_1')
                                            <option value="{{ $banner_type }}" @isset($banner){{ $banner->banner_type == $banner_type ? 'selected' : '' }} @endisset>{{ __('Full Width(100%)') }}</option>
                                        @else
                                            <option value="{{ $banner_type }}" @isset($banner){{ $banner->banner_type == $banner_type ? 'selected' : '' }} @endisset>{{ __('Half Width(50%)') }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group pt-3">
                                <div class="mb-4">
                                    <h5 class="fs-14 mb-1">{{__('Slider')}}<span class="text-danger">*</span></h5>
                                    <div class="input-group">
                                        <input type="file" name="image" class="form-control" value="{{ isset($banner) ? $banner->image : old('image') }}" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                    </div>
                                    <p class="text-muted full-text"><span class="text-danger">**</span>{{__('Ky imazh është i dukshëm në të gjithë gjerësinë e homepage. Madhësia e përshatshme e imazhit është 1920x1920px.')}}</p>
                                    <p class="text-muted half-text" style="display: none;"><span class="text-danger">**</span>{{__('Ky imazh është i dukshëm në të gjithë gjerësinë e homepage. Madhësia e përshatshme e imazhit është 830x450px.')}}</p>
                                    <p class="text-muted menu-text" style="display: none;"><span class="text-danger">**</span>{{__('Ky imazh është i dukshëm në menu. Madhësia e përshatshme e imazhit është 450x600px.')}}</p>
                                </div>
                                @if ($errors->has('image'))
                                    <div class="invalid-feedback">
                                        <p>{{ $errors->first('image') }}</p>
                                    </div>
                                @endif
                            </div>
                            @if(isset($banner))
                            <div class="pt-3 pb-3">
                                @if ($banner->banner_type == 'col_1')
                                    <img style="width: 100%" src="{{ asset('images/banners/large/'.$banner->image) }}" alt="{{$banner->image}}">
                                @else
                                    <img style="width: 50%" src="{{ asset('images/banners/medium/'.$banner->image) }}" alt="{{$banner->image}}">
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary btn-label right ms-auto">
                                    <i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>{{ __('Ruaj') }}
                                </button>
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
<script type="text/javascript">
$("#bannerType").click(function() {
    var banner_type = $(this).val();
    if(banner_type === 'col_1')
    {
        $(".full-text").show(); 
        $(".half-text").hide();
    }else if(banner_type === 'col_2')
    {
        $(".full-text").hide();
        $(".half-text").show();
    }else
    {
        $(".full-text").show(); 
        $(".half-text").hide(); 
    }

});

var selected_option = $('#bannerType option:selected').val();
if(selected_option === 'col_1'){
    $(".full-text").show(); 
    $(".half-text").hide();
}else{
    $(".full-text").hide();
    $(".half-text").show();
}
$('#bannerPosition').on('change', function() {
    if($(this).val() == 'menu') {
        $('#categoryDiv').show();
        $('#bannerTypeDiv').css('display', 'none');
        $(".half-text").hide();
        $(".full-text").hide();
        $(".menu-text").show();
    } else {
        $('#categoryDiv').hide();
        $('#bannerTypeDiv').css('display', 'block');
        $(".menu-text").hide();
    }
});
</script>
    
@endpush

