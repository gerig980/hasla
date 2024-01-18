@extends('layouts.backend.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{__('Baner & Sliders')}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}">{{__('Paneli')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Baner')}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Sliders</h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('app.sliders.create') }}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i>Shto Slider </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Baner')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Veprimet')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $key => $slider)
                        <tr id="row_{{$slider->id}}">
                            <td >{{ $slider->order }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if(!empty($slider->bg_image))
                                        <img style="width: 100px;height:30px" src="{{ asset('images/banners/large/'.$slider->bg_image) }}" alt="{{$slider->bg_image}}">
                                    @else
                                        <img style="width: 100px;height:30px" src="{{ asset('images/KF-banner.png') }}">
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if ($slider->status === 1)
                                    <a href="javascript: void(0);" class="updateSliderStatus"
                                        id="slider-{{ $slider->id }}" slider_id="{{ $slider->id }}">
                                        <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                            style="font-size:30px; color:#45cb85;"></i>
                                    </a>
                                @else
                                    <a href="javascript: void(0);" class="updateSliderStatus"
                                        id="slider-{{ $slider->id }}" slider_id="{{ $slider->id }}">
                                        <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                            style="font-size:30px; color:#45cb85;"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="View">
                                        <a href="" class="text-primary d-inline-block">
                                            <i class="ri-eye-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <a href="{{ route('app.sliders.edit',$slider->id) }}" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Remove">
                                        <a onclick="deleteData({{ $slider->id }})" class="text-danger d-inline-block remove-item-btn">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                        <form id="delete-form-{{ $slider->id }}" method="POST"
                                            action="{{ route('app.sliders.destroy', $slider->id) }}">
                                            @csrf
                                            @method('DELETE')
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
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Lista e Banerave</h5>
                    <div class="flex-shrink-0">
                        <a href="{{ route('banners.create') }}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i>Shto Baner </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Baner')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Pozicioni')}}</th>
                            <th>{{__('Veprimet')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $key => $banner)
                        <tr id="row_{{$banner->id}}">
                             <td>{{ $banner->order }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if(!empty($banner->image))
                                        <img style="width: 100px;height:30px" 
                                        @if($banner->banner_type == 'col_1')
                                        src="{{ asset('images/banners/large/'.$banner->image) }}" 
                                        @else
                                        src="{{ asset('images/banners/medium/'.$banner->image) }}"
                                        @endif
                                        alt="{{$banner->image}}">
                                    @else
                                        <img style="width: 100px;height:30px" src="{{ asset('images/KF-banner.png') }}">
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if ($banner->status === 1)
                                    <a href="javascript: void(0);" class="updateBannerStatus"
                                        id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}">
                                        <i class="las la-toggle-on" aria-hidden="true" status="Active"
                                            style="font-size:30px; color:#45cb85;"></i>
                                    </a>
                                @else
                                    <a href="javascript: void(0);" class="updateBannerStatus"
                                        id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}">
                                        <i class="las la-toggle-off" aria-hidden="true" status="Inactive"
                                            style="font-size:30px; color:#45cb85;"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($banner->position == 'menu')
                                    <p class="text-success">MENU</p>
                                @else
                                    <p class="text-danger">FAQE</p>     
                                @endif
                            </td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="View">
                                        <a href="" class="text-primary d-inline-block">
                                            <i class="ri-eye-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <a href="{{ route('banners.edit', $banner->id) }}" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Remove">
                                        <a onclick="deleteBanner({{ $banner->id }})" class="text-danger d-inline-block remove-item-btn">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                        <form id="delete-banner-{{ $banner->id }}" method="POST"
                                            action="{{ route('banners.destroy', $banner->id) }}">
                                            @csrf
                                            @method('DELETE')
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
    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript">
    $(".updateSliderStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var slider_id = $(this).attr("slider_id");
        $.ajax({
            type: 'post',
            url: 'slider-status-change',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                slider_id: slider_id
            },

            success: function(resp) {
                if (resp['status'] === 0) {
                    $("#slider-" + slider_id).html(
                        "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                    );
                } else if (resp['status'] === 1) {
                    $("#slider-" + slider_id).html(
                        "<i class='las la-toggle-on' aria-hidden='true' status='Active' style='font-size:30px;color:#45cb85;'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    $(".updateBannerStatus").click(function() {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            type: 'post',
            url: 'banner-status-change',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                banner_id: banner_id
            },

            success: function(resp) {
                if (resp['status'] === 0) {
                    $("#banner-" + banner_id).html(
                        "<i class='las la-toggle-off' aria-hidden='true' status='Inactive' style='font-size:30px;color:#45cb85;'></i>"
                    );
                } else if (resp['status'] === 1) {
                    $("#banner-" + banner_id).html(
                        "<i class='las la-toggle-on' aria-hidden='true' status='Active' style='font-size:30px;color:#45cb85;'></i>"
                    );
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    function deleteData(id) {
        Swal.fire({
            title: 'Jeni të sigurt që doni ta fshini këtë Slider?',
            text: "Nëse ky rekord do të fshihet atëher ai nuk do kthehet më!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Po, fshi Slider!',
            cancelButtonText: 'Anullo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }

    function deleteBanner(id) {
        Swal.fire({
            title: 'Jeni të sigurt që doni ta fshini këtë Baner?',
            text: "Nëse ky rekord do të fshihet atëher ai nuk do kthehet më!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Po, fshi Banner!',
            cancelButtonText: 'Anullo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-banner-' + id).submit();
            }
        })
    }
    </script>
@endpush

