@extends('layouts/backend')

@section('title', 'Category')
@section('content')
    <x-content-header title="Category"></x-content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <x-card>
                        <x-card-header>
                            <x-link style="info btn-sm" url="{{ route('categories.index') }}"><i class="fas fa-arrow-left"></i>
                                Back</x-link>
                        </x-card-header>
                        <x-card-body>
                            <form action="{{ $action }}" method="post">
                                @if ($type == 'edit')
                                    @method('PUT')
                                @endif
                                @csrf

                                <div class="form-group">
                                    <x-label label="name">Category Name</x-label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $name }}">
                                    @error('name')
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
@push('scripts-down')
    <script>
        $('#name').change(function() {
            $.get('{{ url('check_slug_category') }}', {
                    'name': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>
@endpush
