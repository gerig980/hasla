@extends('layouts.backend.app') 
@push('css')
 <!-- Plugins css -->
 <link rel="stylesheet" href="{{URL::asset('backend/assets/libs/dropzone/dropzone.css')}}" type="text/css" />

 <style>
    hr:not([size]) {
        height: 2px;
    }
    .button-delete {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Krijo guidë përmasash</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('size-guides.index') }}">Guida e përmasave</a></li>
                    <li class="breadcrumb-item active">Krijo guidë përmasash</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{ route('size-guides.store') }}" method="POST" id="createproduct-form"  autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Emri<span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="formFile">Foto<span class="text-danger">*</span></label>
                        <input name="image" class="form-control" type="file" id="formFile" required>
                    </div>
                    <div class="mt-4">
                        <label>Përzgjidh tipin e guidës<span class="text-danger">*</span></label>
                        <select name="type" class="form-control">
                            <option value="tops">Tops</option>
                            <option value="bottoms">Bottoms</option>
                            <option value="shoes">Shoes</option>
                        </select>
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
                        <textarea name="description" id="ckeditor-classic"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-12">
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

@endpush