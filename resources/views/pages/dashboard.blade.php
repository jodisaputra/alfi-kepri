@extends('layouts/backend')

@section('title', 'Dashboard')
@section('content')
    <x-content-header title="Dashboard"></x-content-header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <x-card>
                        <x-card-header>
                            <h5 class="card-title">Card title</h5>
                        </x-card-header>
                        <x-card-body>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et debitis officiis beatae?
                            </p>
                            <x-button type="submit" style="danger">Test Button</x-button>
                        </x-card-body>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
@endsection
