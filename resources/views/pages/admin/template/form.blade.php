@extends('layouts/backend')

@section('title', 'Template')
@section('content')
    <x-content-header title="Template"></x-content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <x-card>
                        <x-card-header>
                            <x-link style="info btn-sm" url="{{ route('templates.index') }}"><i class="fas fa-arrow-left"></i>
                                Back</x-link>
                        </x-card-header>
                        <x-card-body>
                            <form action="{{ $action }}" method="post">
                                @if ($type == 'edit')
                                    @method('PUT')
                                @endif
                                @csrf

                                <div class="form-group">
                                    <x-label label="name">Template Name</x-label>
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
                                    <x-label label="path">Path</x-label>
                                    <input type="text" id="path"
                                        class="form-control @error('path') is-invalid @enderror" name="path"
                                        value="{{ $path }}">
                                    @error('path')
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
