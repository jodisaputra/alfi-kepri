@extends('layouts/frontend')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto pt-md-5">
                    <a href="#" class="badge text-bg-primary mb-2"><i
                            class="fas fa-circle me-2 small fw-bold"></i>{!! $post->category->name !!}</a>
                    <h1 class="display-4">{{ $post->title }}</h1>
                    <ul class="nav nav-divider align-items-center">
                        <li class="nav-item">
                            <div class="nav-link">
                                by <a class="text-reset btn-link">{{ $post->user->name }}</a>
                            </div>
                        </li>
                        <li class="nav-item">{{ $post->created_at->diffForHumans() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container position-relative">
            <div class="row">
                <!-- Main Content START -->
                <div class="col-lg-9 mx-auto">

                    {!! $post->content !!}

                    <!-- Next prev post START -->
                    <div class="row g-0 mt-5 mx-0 border-top border-bottom">
                        <div class="col-sm-6 py-3 py-md-4">
                            <div class="d-flex align-items-center position-relative">
                                <!-- Icon -->
                                <div class="bg-primary py-1">
                                    <i class="bi bi-chevron-compact-left fs-3 text-white px-1 rtl-flip"></i>
                                </div>
                                <!-- Title -->
                                <div class="ms-3">
                                    @if ($previous != null)
                                        <h5 class="m-0"> <a href="{{ route('frontend.detailpost', $previous->slug) }}"
                                                class="stretched-link btn-link text-reset">{{ $previous->title }}</a></h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 py-3 py-md-4 text-sm-end">
                            <div class="d-flex align-items-center position-relative">
                                <!-- Title -->
                                <div class="me-3">
                                    @if ($next != null)
                                        <h5 class="m-0"> <a href="{{ route('frontend.detailpost', $next->slug) }}"
                                                class="stretched-link btn-link text-reset">{{ $next->title }}</a></h5>
                                    @endif
                                </div>
                                <!-- Icon -->
                                <div class="bg-primary py-1">
                                    <i class="bi bi-chevron-compact-right fs-3 text-white px-1 rtl-flip"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Next prev post START -->

                </div>
                <!-- Main Content END -->
            </div>
        </div>
    </section>
@endsection
