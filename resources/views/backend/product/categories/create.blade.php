@extends('layouts.backend.app') 
@push('css')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice,
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
        background: #0ab39c;
        border: 1px solid #0ab39c;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
        color: #fff;
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panelet</a></li>
                        <li class="breadcrumb-item active">Paneli</li>
                    </ol>
                </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Kategoritë</h5>
            </div>
            <div class="card-body">
                 @include('backend.product.categories.components.categories', ['categories' => $categories])
            </div>
        </div>
    </div><!--end col-->
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Krijo Kategori</h5>
            </div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('POST')
                    <div class="row gy-4">
                        <div class="col-6">
                            <label for="placeholderInput" class="form-label">Emri<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="placeholderInput" placeholder="Kategoria" name="name" required>
                            @error('name')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="placeholderInput" class="form-label">Kategoria Prind</label>
                            <div class="col-lg-12">
                                <select class="js-example-basic-single form-control" name="parent_id" data-toggle="select2">
                                    <option value="" selected="">Jo Prind...</option>
                                        @foreach($categories as $single_category)
                                            <option value="{{ $single_category->id }}"> &#9654; {{ $single_category->name }}</option>
                                                @foreach($single_category->children as $child_first)
                                                    @if(!empty($child_first))
                                                        <option value="{{ $child_first->id }}"> &nbsp;&nbsp;&#9656;&#9656; {{ $child_first->name }}</option>
                                                    @endif
                                                    @foreach($child_first->children as $child_second)
                                                        @if(!empty($child_second))
                                                            <option value="{{ $child_second->id }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#9656;&nbsp; {{ $child_second->name }}</option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="placeholderInput" class="form-label">Përshkrimi</label>
                            <textarea class="form-control" id="placeholderInput" placeholder="Përshkrimi i shkurtër i kategorisë" name="description" rows="4"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="placeholderInput" class="form-label">Icona<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="formFile" placeholder="Imazhi ikon i kategorisë" name="icon" required>
                        </div>
                        <div class="col-6">
                            <label for="placeholderInput" class="form-label">Baner</label>
                            <input type="file" class="form-control" id="formFile" placeholder="Baneri i kategorinë" name="banner">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="placeholderInput" class="form-label">Filtrim sipas Atributeve</label>
                            <div class="col-lg-12">
                                <select class="js-example-basic-multiple" name="attribute_id[]" multiple="multiple">
                                    @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="placeholderInput" class="form-label">Filtrim sipas Detajeve</label>
                            <select class="js-example-basic-multiple" name="filter_attribute_id[]" multiple="multiple">
                                @foreach($filter_attributes as $filter_attribute)
                                    <option value="{{ $filter_attribute->id }}">{{ $filter_attribute->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="placeholderInput" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" id="placeholderInput" placeholder="Titulli për SEO" name="meta_title">
                        </div>
                        
                        <div class="col-12">
                            <label for="placeholderInput" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="placeholderInput" placeholder="Përshkrimi i shkurtër i kategorisë për SEO" name="meta_description" rows="4"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="placeholderInput" class="form-label">Meta Keywords</label>
                            <textarea class="form-control" id="placeholderInput" placeholder="Fjalë Kyçe për SEO" name="meta_keywords" rows="4"></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Ruaj</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-danger">Anullo</a>
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
            </form>
        </div>
    </div><!--end col-->
</div><!--end row-->
@endsection
@push('js')
@endpush