<div class="col-sm-6 col-lg-4">
    <div class="card card-overlay-bottom card-image-scale">
        <!-- Card Image -->
        <img src="{{ asset('storage/post/' . $image) }}" alt="">
        <!-- Card Image overlay -->
        <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
            <div>
                <!-- Card category -->
                <a href="{{ $urlcategory }}" class="badge text-bg-info mb-2"><i
                        class="fas fa-circle me-2 small fw-bold"></i>{{ $category }}</a>
            </div>
            <div class="w-100 mt-auto">
                <!-- Card title -->
                <h4 class="text-white"><a href="post-single-5.html"
                        class="btn-link text-reset stretched-link">{{ $title }}</a></h4>
                <!-- Card info -->
                <ul class="nav nav-divider text-white-force align-items-center small">
                    <li class="nav-item position-relative">
                        <div class="nav-link">by <a href="{{ $urlpost }}"
                                class="stretched-link text-reset btn-link">{{ $user }}</a>
                        </div>
                    </li>
                    <li class="nav-item">{{ $date }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
