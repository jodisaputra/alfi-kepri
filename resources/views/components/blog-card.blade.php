<div class="col-sm-6 col-lg-4">
    <div class="card card-overlay-bottom card-image-scale">
        <!-- Card Image -->
        <div class="d-block mb-4 h-10">
            <img src="{{ asset('storage/post/' . $image) }}" alt="" style="width: 100%; height: 250px;">
        </div>
        <!-- Card Image overlay -->
        <div class="card-img-overlay d-flex flex-column p-3 p-md-4">
            <div>
                <!-- Card category -->
                <a href="{{ $urlcategory }}" class="badge text-bg-info mb-2"><i
                        class="fas fa-circle me-2 small fw-bold"></i>{!! $category !!}</a>
            </div>
            <div class="w-100 mt-auto">
                <!-- Card title -->
                <h4 class="text-white"><a href="{{ $urlpost }}"
                        class="btn-link text-reset stretched-link">{!! $title !!}</a></h4>
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
