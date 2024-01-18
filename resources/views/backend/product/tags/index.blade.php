@extends('layouts.backend.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Paneli</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Tags</a></li>
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
                        <h5 class="card-title mb-0 flex-grow-1">Tags</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Emri</th>
                                <th scope="col">Veprimet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$tags->isEmpty())
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-{{ $tag->id }}"
                                                class="btn btn-sm btn-soft-warning btn-animation waves-effect waves-light"><i
                                                    class="ri-edit-line"></i></a>
                                            <button onclick="deleteData({{ $tag->id }})"
                                                class="btn btn-sm btn-soft-danger btn-animation waves-effect waves-light"><i
                                                    class="ri-delete-bin-5-line"></i></button>
                                            <form id="delete-form-{{ $tag->id }}" method="POST"
                                                action="{{ route('tags.destroy', $tag->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- edit tag modal -->
                                    <div class="modal fade bs-example-modal-center-{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fadeInleftModalLabel">Ndrysho Tag</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="text" name="name" value="{{ $tag->name }}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" value="Ndrysho">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Anullo</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Shto Tag</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p>Emri</p>
                    <div id="fuzzysearch-list">
                        <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" class="fuzzy-search form-control mb-2"
                                placeholder="Shembull: New" />
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
                title: 'Jeni të sigurt që doni ta fshini tag-un?',
                text: "Nuk mundeni ta ktheni përsëri nëse e fshini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Po, fshije tag-un!',
                cancelButtonText: 'Anullo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
