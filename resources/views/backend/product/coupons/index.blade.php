@extends('layouts.backend.app') 
@push('css')

@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{__('Kuponat')}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('Ecommerce')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Kuponat')}}</li>
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
                    <h5 class="card-title mb-0 flex-grow-1">{{__('Historia e Kuponit')}}</h5>
                    <div class="flex-shrink-0">
                        <a href="{{route('coupons.create')}}" type="button" class="btn btn-success add-btn"  id="create-btn"><i class="ri-add-line align-bottom me-1"></i>{{__('Shto Kupon')}} </a>
                    </div>
                </div>
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
                            <th>{{__('Baneri')}}</th>
                            <th>{{__('Titulli')}}</th>
                            <th>{{__('Kodi')}}</th>
                            <th>{{__('Tipi')}}</th>
                            <th>{{__('Dita e Fillimit')}}</th>
                            <th>{{__('Dita e Mbarimit')}}</th>
                            <th>{{__('Statusi')}}</th>
                            <th>{{__('Veprimet')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $key => $coupon)
                        <tr id="row_{{$coupon->id}}">
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                </div>
                            </th>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-light rounded p-1 me-2">
                                        @if(!empty($coupon->banner))
                                            <img style="width: 40px;" src="{{ asset('images/coupons/'.$coupon->banner) }}" alt="{{$coupon->title}}">
                                        @else
                                            <img style="width: 40px;" src="{{ asset('images/admin_products/small/no-image.png') }}">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">{{$coupon->title}}</a></h5>
                                </div>
                            </td>
                            <td>{{$coupon->code}}</td>
                            <td>
                                {{ $coupon->type == 'product_base' ? __('Kupon Produkti') : __('Kupon Total Fature') }}
                            </td>
                            <td>
                                <span>{{ $coupon->start_date != '' ? date('M d, Y h:i a', strtotime($coupon->start_date)) : '' }}</span><br>
                            </td>
                            <td>
                                <span>{{ $coupon->start_date != '' ? date('M d, Y h:i a', strtotime($coupon->end_date)) : '' }}</span><br>
                            </td>
                            <td>
                                @php
                                    $now = strtotime(\Carbon\Carbon::now());
                                    $start = strtotime($coupon->start_date);
                                    $end = strtotime($coupon->end_date);
                                @endphp
                                @if ($coupon->status == 1 && $now >= $start && $now <= $end)
                                    <p>Aktive</p>
                                @else
                                <p>Jo Aktiv</p>
                                @endif
                            </td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                        <a href="{{route('coupon.edit', $coupon->id)}}" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Remove">
                                        <a class="text-danger d-inline-block remove-item-btn" onclick="deleteCoupon({{ $coupon->id }})">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                        <form id="delete-coupon-{{ $coupon->id }}" method="POST"
                                            action="{{ route('coupon.delete', $coupon->id) }}">
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
<script>
    $(document).ready(function() {
        $('#couponType').on('change', function() {
            if($(this).val() === 'product_base') {
                $('#coupon-type').removeClass('d-none');
                $('#coupon-type').addClass('d-block');
            } else {
                $('#coupon-type').removeClass('d-block');
                $('#coupon-type').addClass('d-none');
            }
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

    // delete coupon
    function deleteCoupon(id) {
            Swal.fire({
                title: 'Jeni të sigurt që doni ta fshini kuponin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije kuponin!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-coupon-' + id).submit();
                }
            })
        }
</script>
@endpush

