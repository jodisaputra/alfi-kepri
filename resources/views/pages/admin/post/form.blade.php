@extends('layouts/backend')

@section('title', 'Post')
@section('content')
    <x-content-header title="Post">
    </x-content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <x-card>
                        <x-card-header>
                            <x-link style="info btn-sm" url="{{ route('posts.index') }}"><i class="fas fa-arrow-left"></i>
                                Back</x-link>
                        </x-card-header>
                        <x-card-body>
                            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                                @if ($type == 'edit')
                                    @method('PUT')
                                @endif
                                @csrf

                                <div class="form-group">
                                    <x-label label="title">Title</x-label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $title }}">
                                    @error('title')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-label label="slug">Slug</x-label>
                                    <input type="text" id="slug"
                                        class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        value="{{ $slug }}">
                                    @error('slug')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-label label="content">Content</x-label>
                                    <textarea type="text" id="content" class="form-control @error('content') is-invalid @enderror" name="content">{{ $content }}</textarea>
                                    @error('content')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-label label="image">Image @if ($type == 'edit')
                                            <small>if image not changes, leave it empty</small>
                                        @endif
                                    </x-label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-label label="category">Category</x-label>
                                    <select class="form-control select2 @error('category') is-invalid @enderror"
                                        name="category">
                                        <option value="">Choose one</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $category == $item->id ? 'selected' : null }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <x-label label="status">Status</x-label>
                                    <select class="form-control select2 @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="">Choose one</option>
                                        <option value="published" {{ $status == 'published' ? 'selected' : null }}>
                                            PUBLISHED</option>
                                        <option value="draft" {{ $status == 'draft' ? 'selected' : null }}>DRAFT</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <x-button type="submit" style="primary">{{ $type == 'add' ? 'Submit' : 'Save Changes' }}
                                </x-button>

                            </form>
                        </x-card-body>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles-down')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 300px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endpush
@push('scripts-down')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('#title').change(function() {
            $.get('{{ url('check_slug_post') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        })
    </script>
@endpush
