@extends('layouts.backend.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('attributes.index') }}">Atributet</a></li>
                        <li class="breadcrumb-item active">Vlerat</li>
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
                        <h5 class="card-title mb-0 flex-grow-1">Vlerat e atributit</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Vlera e atributit</th>
                                <th scope="col">Atributi</th>
                                <th scope="col">Veprimet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$attribute->attribute_value->isEmpty())
                                @foreach ($attribute->attribute_value as $attributevalue)
                                    <tr>
                                        <td class="fw-medium">{{ $attributevalue->id }}</td>
                                        <td>
                                            <span style="font-size:13px;" class="badge badge-inline badge-md bg-soft-dark text-black p-2 my-1">{{ $attributevalue->value }}</span>
                                        </td>
                                        <td>{{ $attribute->name }}</td>
                                        <td>
                                            <a  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-user_{{ $attributevalue->id }}" class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i class="ri-edit-line"></i></a>
                                            <!-- edit customer modal -->
                                            <div class="modal fade bs-example-modal-center-user_{{ $attributevalue->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="fadeInleftModalLabel">Modifiko Ngjyrën</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('attribute-values.update', $attributevalue->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT') 
                                                        <div class="modal-body">
                                                            <p>Emri Atributit</p>
                                                            <input type="text" name="value" class="fuzzy-search form-control mb-4" value="{{ $attributevalue->value }}" required />
                                                            <input type="hidden" name="attribute_id" value="{{ $attributevalue->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Anullo</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <button onclick="deleteData({{ $attributevalue->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $attributevalue->id }}" method="POST"
                                                action="{{ route('attribute-values.destroy', $attributevalue->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p class="h5">Nuk ka asnjë Vlerë për<strong> {{ $attribute->name }}
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
                    <h4 class="card-title mb-0">Shto Vlerë</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Atributi</p>
                    <input type="text" class="fuzzy-search form-control mb-4" value="{{ $attribute->name }}" readonly />
                    <p>Emri i Vlerës</p>
                    <div id="fuzzysearch-list">
                        <form action="{{ route('attribute-values.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="attribute_id" value="{{ $attribute->id }}" />
                            <input type="text" name="value" class="fuzzy-search form-control mb-4" placeholder="Emri"
                                required />
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
    <script type="text/javascript">
        function deleteData(id) {
            Swal.fire({
                title: 'Jeni të sigurt që doni ta fshini Atributin?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije postimin!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
