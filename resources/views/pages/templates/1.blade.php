@extends('layouts/frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto text-center">
                    <h1 class="display-4">{{ $page->title }}</h1>
                    <!-- breadcrumb -->
                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dots mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bi bi-house me-1"></i> Home</a></li>
                            <li class="breadcrumb-item active">{{ $page->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
