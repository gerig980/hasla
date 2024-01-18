@extends('layouts.backend.app')
@push('css')
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
          <h4 class="mb-sm-0">{{ __('Krijo Kupona') }}</h4>
          <div class="page-title-right">
             <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('app.product.index') }}">{{ __('Lista e Kuponave') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Krijo Kupon') }}</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
<!-- end page title -->

    <div class="row">
        <div class="col-xl-10 offset-1">
            <div class="card">
                <div class="card-body checkout-tab">
                    <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data" id="campaign-create">
                        @csrf
                        <div class="step-arrow-nav mt-n3 mx-n3 mb-3">
                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="true">
                                        <i class="ri-speed-mini-fill fs-16 p-2 bg-soft-primary text-primary rounded-circle align-middle me-2"></i> Informacione rreth Kuponit
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">{{__('Kuponat')}}</h5>
                                    <p class="text-muted mb-4">{{__('Përmbush të dhënat përkatëse të kuponit')}}</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Titulli<span class="text-danger">*</span></label>
                                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" required>
                                                @if ($errors->has('title'))
                                                    <div class="invalid-feedback">
                                                        <p>{{ $errors->first('title') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                            <div class="form-group">
                                            <label for="type" class="form-label">Tipi i Kuponit<span class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <select class="js-example-basic-multiple form-control" name="type" id="couponType" required>
                                                        <option
                                                            {{ old('type') ? (old('type') == "product_base" ? "selected" : "selected") : "" }} value="product_base">{{ __('Kupon Per Produkt') }}</option>
                                                        <option
                                                            {{ old('type') ? (old('type') == "invoice_base" ? "selected" : "selected") : "" }} value="invoice_base">{{ __('Kupon Total Fature') }}</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('type'))
                                                    <div class="invalid-feedback">
                                                        <p>{{ $errors->first('type') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="banner" class="form-label">{{ __('Foto Baneri') }}</label>
                                        <div class="input-group">
                                            <input type="file" name="banner" class="form-control" value="{{ old('banner')}}" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                        </div>
                                        <p class="text-muted">{{__('Përdorni madhësine 130x130')}}</p>
                                    </div>

                                    <div class="form-group {{ old('type') ? (old('type') == "product_base" ? "" : "d-none") : "" }} mb-3" id="div_product_base">
                                        <label for="product_id" class="form-label">{{ __('Produkti') }}<span class="text-danger">*</span></label>
                                            <select class="product-by-ajax form-control js-example-basic-single" id="product_id" multiple="multiple" name="product_id[]" aria-hidden="true"></select>
                                            @if ($errors->has('product_id'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('product_id') }}</p>
                                                </div>
                                            @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="code" class="form-label">{{ __('Kodi') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="code" id="code" value="{{ old('code') }}"
                                            class="form-control" required>
                                        @if ($errors->has('code'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('code') }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="date" class="form-label">{{ __('Periudha Kohore') }}<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bx bx-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" value="{{ old('date') }}" name="date" id="date" placeholder="{{ __('Vendos periudhën kohore që do të zgjasë kuponi') }}" class="form-control daterange-cus" required>
                                        </div>
                                        @if ($errors->has('date'))
                                            <div class="invalid-feedback">
                                                <p>{{ $errors->first('date') }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <table class="table col-12 mb-3">
                                            <tr>
                                                <td width="30%" class="pl-0 pr-0">
                                                    <label class="form-label">{{ __('Tipi i Zbritjes') }} <span class="text-danger">*</span></label>
                                                    <select class="form-control js-example-basic-single" name="discount_type" data-title="discount_type" id="discount_type" required>
                                                        <option value="flat">{{ __('Shumë Lekësh') }}</option>
                                                        <option value="percent">{{ __('%') }}</option>
                                                    </select>
                                                    @if ($errors->has('discount_type'))
                                                        <div class="invalid-feedback">
                                                            <p>{{ $errors->first('discount_type') }}</p>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td width="70%" class="pl-0 pr-0">
                                                    <label for="discount" class="form-label">{{ __('Zbritja') }} <span class="text-danger">*</span></label>
                                                    <input type="number" step="any" name="discount" id="discount" value="{{ old('discount') }}" class="form-control" required>
                                                    @if ($errors->has('discount'))
                                                        <div class="invalid-feedback">
                                                            <p>{{ $errors->first('discount') }}</p>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- <div class="{{ old('type') ? (old('type') == "invoice_base" ? "" : "d-none") : "d-none" }}" id="div_invoice_base">
                                        <div class="form-group mb-3">
                                            <label for="minimum_shopping" class="form-label">{{ __('Minimum Shopping') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="minimum_shopping" id="minimum_shopping" value="{{ old('minimum_shopping') }}" class="form-control">
                                            @if ($errors->has('minimum_shopping'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('minimum_shopping') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="maximum_discount" class="form-label">{{ __('Zbritja Maximum') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="maximum_discount" id="maximum_discount" value="{{ old('maximum_discount') }}" class="form-control">
                                            @if ($errors->has('maximum_discount'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('maximum_discount') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div> -->

                                    <div class="text-end mb-3">
                                        <button type="submit" class="btn btn-danger w-sm">Anullo</button>
                                        <button type="submit" class="btn btn-success w-sm">Ruaj</button>
                                    </div>
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
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
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
        $(document).ready(function () {
            $('.product-by-ajax').select2({
                placeholder: "{{ __('Zgjidh Produkt') }}",
                minimumInputLength: 1,
                closeOnSelect: true,
                'multiple': true,
                ajax: {
                    type: "GET",
                    dataType: 'json',
                    url: '{{ route('product.by.ajax') }}',
                    data: function (params) {
                        return {
                            q: params.term // search term
                        };
                    },
                    delay: 250,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
