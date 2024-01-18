@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('attributes.index') }}">Atributet</a></li>
                        <li class="breadcrumb-item active">Ngjyrat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Vlerat e Ngjyrave</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Emri</th>
                                <th scope="col" class="text-center">Kodi i ngjyrës</th>
                                <th scope="col">Veprimet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$colors->isEmpty())
                                @foreach ($colors as $color)
                                    <tr>
                                        <td class="fw-medium">{{ $loop->iteration }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td class="text-center">
                                            <span 
                                            class="badge badge-inline badge-md p-2 my-1" style="border-radius: 50% !important;background: {{ $color->code }} !important;">
                                            </span><br>
                                            {{ $color->code }}
                                        </td>
                                        <td>
                                            <a  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-user_{{ $color->id }}" class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                            <!-- edit color modal -->
                                            <div class="modal fade bs-example-modal-center-user_{{ $color->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Modifiko Ngjyrën</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('app.color.update') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT') 
                                                        <div class="modal-body">
                                                            <p>Emri</p>
                                                            <input type="text" name="name" class="fuzzy-search form-control mb-4" value="{{ $color->name }}" required />
                                                            <input type="hidden" name="color_id" value="{{ $color->id }}">
                                                            <p>Kodi i Ngjyrës</p>
                                                            <div class="input-group colorpickerinput">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text" style="padding: .8rem .9rem !important;">
                                                                        <i class='bx bxs-color-fill' ></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" name="code" id="background_color" value="{{ $color->code }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Anullo</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <button onclick="deleteData({{ $color->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $color->id }}" method="POST"
                                                action="{{ route('app.color.delete', $color->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnjë Vlerë për<strong> {{ $color->name }}
                                            </strong>!</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto Ngjyrë</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <input type="text" class="fuzzy-search form-control mb-4" value="Atributi: Ngjyrë" readonly />
                    
                    <div id="fuzzysearch-list">
                        <form action="{{ route('app.color.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <p>Emri i Ngjyrës</p>
                            <input type="text" name="name" class="fuzzy-search form-control mb-4" placeholder="Emri"
                                required />
                                <p>Kodi i Ngjyrës</p>
                                <div class="input-group colorpickerinput">
                                    <div class="input-group-append">
                                        <div class="input-group-text" style="padding: .8rem .9rem !important;">
                                            <i class='bx bxs-color-fill' ></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="code" value="" id="background_color" placeholder="Vendos ngjyrën e background">
                                    
                                </div>
                            </div>
                            <div class="text-end">
                                <input type="submit" class="btn btn-success waves-effect waves-light mt-3" value="Shto">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ajax-div-load.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            Swal.fire({
                title: 'Jeni të sigurt që doni ta fshini postimin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije Ngjyrën!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
