@extends('layouts/backend')

@section('title', 'Post')
@section('content')
    <x-content-header title="Post"></x-content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <x-card>
                        <x-card-header>
                            <x-link style="info btn-sm" url="{{ route('posts.create') }}"><i class="fas fa-plus"></i> Add New</x-link>
                        </x-card-header>
                        <x-card-body>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Post Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $post->title }} <br>
                                                <small><em><strong>Status :</strong></em></small> <small class="{{ $post->status == 'published' ? 'text-success' : 'text-danger' }}"><em>{{ Str::ucfirst($post->status) }}</em></small>
                                            </td>
                                            <td>{{ $post->slug }}</td>
                                            <td><img style="width: 20%; height: 20%;" src="{{ asset('storage/post/' . $post->image) }}" alt=""></td>
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            <td>
                                                <x-link style="warning" url="{{ route('posts.edit', $post->id) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </x-link>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onclick="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('delete')
                                                    <x-button type="submit" style="btn btn-danger"><i class="fas fa-trash"></i> Delete</x-button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </x-card-body>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles-down')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts-down')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
