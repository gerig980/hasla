@extends('layouts.backend.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
       <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">{{ __('Krijo Slider') }}</h4>
          <div class="page-title-right">
             <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('banners.index') }}">{{ __('Lista e Slider') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Krijo Slider') }}</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
<div class="row">
    <div class="col-xl-8 offset-2">
        <div class="card">
            <div class="card-header input-title">
                <h4>{{ __('Shto Slider')}}</h4>
            </div>
            <div class="card-body card-body-paddding">
                @php
                    $route = isset($slider) ? route('app.sliders.update',$slider->id) : route('app.sliders.store')
                @endphp

                <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                    @csrf
                    @isset($slider)
                        @method('put')
                        <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}"
                                name="r">
                    @endisset
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="order">{{ __('Radha') }}</label>
                                <input type="number" class="form-control" name="order" id="order"
                                        value="{{ isset($slider) ? $slider->order : old('order') }}"
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
                                        value="{{ isset($slider) ? $slider->link : old('link') }}"
                                        placeholder="{{__('Link')}}">
                                </div>
                                @if ($errors->has('link'))
                                    <div class="invalid-feedback">
                                        <p>{{ $errors->first('link') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-3">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">{{__('Slider')}}<span class="text-danger">*</span></h5>
                            <p class="text-muted">{{__('Shto imazhin kryesore të sliderit.')}}</p>
                            <div class="input-group">
                                <input type="file" name="bg_image" class="form-control" value="{{ isset($slider) ? $slider->bg_image : old('bg_image') }}" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>
                            <p class="text-muted">{{__('Ky imazh është i dukshëm në të gjithë kutinë e slider. Përdorni madhësine ...')}}</p>
                        </div>
                        @if ($errors->has('bg_image'))
                            <div class="invalid-feedback">
                                <p>{{ $errors->first('bg_image') }}</p>
                            </div>
                        @endif
                    </div>
                    @if(isset($slider))
                        <div class="pt-3 pb-3">
                            <img style="width: 100%" src="{{ asset('images/banners/large/'.$slider->bg_image) }}" alt="{{$slider->bg_image}}">
                        </div>
                    @endif
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab">
                            <i class="ri-bank-card-line label-icon align-middle fs-16 ms-2"></i>{{ __('Ruaj') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

