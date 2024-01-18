@extends('layouts.backend.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('attributes.index') }}">Atributet</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 offset-2">
            <div class="card">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Atributet</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Vlerat</th>
                                <th scope="col">Veprimet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ngjyra</td>
                                <td style="white-space: unset;">
                                    @if (!$colors->isEmpty())
                                        @foreach ($colors as $color)
                                                <span 
                                                    class="badge badge-inline badge-md p-2 my-1" style="border-radius: 50% !important;background: {{ $color->code }} !important;">
                                                </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('app.colors') }}"
                                        class="btn btn-sm btn-soft-success btn-animation waves-effect waves-light"><i
                                        class="ri-settings-line"></i>
                                    </a>
                                </td>
                            </tr>
                            @if (!$attributes->isEmpty())
                                @foreach ($attributes as $attribute)
                                    <tr>
                                        <td>@php $iteration = $loop->iteration + 1 @endphp {{ $iteration }}</td>
                                        <td>{{ $attribute->name }}</td>
                                        <td style="white-space: unset;">
                                            @foreach ($attribute->attribute_value as $attributevalue)
                                                @if ($attribute->id == $attributevalue->attribute_id)
                                                    <span style="font-size:13px;"
                                                        class="badge badge-inline badge-md bg-soft-dark text-black p-2 my-1">{{ $attributevalue->value }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('attributes.show', $attribute->id) }}"
                                                class="btn btn-sm btn-soft-success btn-animation waves-effect waves-light"><i
                                                    class="ri-settings-line"></i></a>
                                            {{-- <a href="{{ route('attributes.edit', $attribute->id) }}"
                                                class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                                    class="ri-edit-line"></i></a>
                                            <button onclick="deleteData({{ $attribute->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $attribute->id }}" method="POST"
                                                action="{{ route('attributes.destroy', $attribute->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto Atribut</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        <form action="{{ route('attributes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" class="fuzzy-search form-control mb-2"
                                placeholder="Shembull: Ngjyra" />
                            <div class="text-end">
                                <input type="submit" class="btn btn-success waves-effect waves-light mt-3" value="Shto">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end card -->
        </div> --}}
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@push('js')
    {{-- <script type="text/javascript">
        function deleteData(id) {
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
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script> --}}
@endpush
