@extends('layouts/frontend')

@section('content')
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($page->image == null || $page->image == '')
                        <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-400 text-center"
                            style="background-image:url({{ asset('frontend') }}/assets/images/blog/16by9/09.jpg); background-position: center left; background-size: cover;">
                        @else
                            <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-400 text-center"
                                style="background-image:url({{ asset('storage/page/' . $page->image) }}); background-position: center left; background-size: cover;">
                    @endif
                    <!-- Card Image overlay -->
                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                        <div class="w-100 my-auto">
                            <h1 class="text-white display-4">{{ $page->title }}</h1>
                            <!-- breadcrumb -->
                            <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i
                                                class="bi bi-house me-1"></i>
                                            Home</a></li>
                                    <li class="breadcrumb-item active">{{ $page->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="pt-4 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
