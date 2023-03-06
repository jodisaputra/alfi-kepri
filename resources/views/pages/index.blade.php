@extends('layouts/frontend')

@section('content')
    <section class="pt-3 pb-3 mb-2 card-grid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round rounded-3 overflow-hidden">
                        <div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="1"
                            data-arrow="true" data-dots="false" data-items="1">
                            <!-- Slide 1 -->
                            <div class="card bg-dark-overlay-3 h-400 h-sm-500 h-md-600 rounded-0"
                                style="background-image:url({{ asset('frontend') }}/assets/images/blog/16by9/05.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5">
                                    <div class="w-100 my-auto">
                                        <div class="col-md-10 col-lg-7 mx-auto text-center">
                                            <!-- Card title -->
                                            <h2 class="text-white display-5"><a class="btn-link text-reset fw-normal">Never
                                                    underestimate the
                                                    influence of social media</a></h2>
                                            <p class="text-white">For who thoroughly her boy estimating conviction.
                                                Removed demands expense account in outward tedious do.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark-overlay-3 h-400 h-sm-500 h-md-600 rounded-0"
                                style="background-image:url({{ asset('frontend') }}/assets/images/blog/16by9/05.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-5">
                                    <div class="w-100 my-auto">
                                        <div class="col-md-10 col-lg-7 mx-auto text-center">
                                            <!-- Card title -->
                                            <h2 class="text-white display-5"><a class="btn-link text-reset fw-normal">Never
                                                    underestimate the
                                                    influence of social media</a></h2>
                                            <p class="text-white">For who thoroughly her boy estimating conviction.
                                                Removed demands expense account in outward tedious do.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0">
        <div class="container">
            <div class="row mt-4 mb-2">
                <h1>Berita</h1>
            </div>
            @forelse ($posts as $post)
                <div class="row g-4">
                    <x-blog-card category="{{ $post->category->name }}" title="{{ $post->title }}"
                        image="{{ $post->image }}" urlcategory="{{ $post->slug }}" urlpost="{{ $post->slug }}"
                        date="{{ $post->created_at->diffForHumans() }}" user="{{ $post->user->name }}"></x-blog-card>
                </div>
            @empty
            <div class="row">
                <p>Belum ada Berita</p>
            </div>
            @endforelse
        </div>
    </section>
@endsection
