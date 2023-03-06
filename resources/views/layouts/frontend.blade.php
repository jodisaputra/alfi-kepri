<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alfikepri | @yield('title')</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

    @include('includes/frontend/styles')

</head>

<body>
    @include('sweetalert::alert')
    <header class="navbar-light navbar-sticky header-static">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="index.html">
                    <img class="navbar-brand-item light-mode-item" src="{{ asset('logo') }}/logo.png" alt="logo">
                    <img class="navbar-brand-item dark-mode-item" src="{{ asset('logo') }}/logo.png" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="text-body h6 d-none d-sm-inline-block">Menu</span>
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Main navbar START -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll mx-auto">

                        <li class="nav-item"> <a
                                class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"
                                href="{{ route('frontend.index') }}">Beranda</a></li>
                        @php
                            $pages = \App\Models\Page::all();
                        @endphp
                        @foreach ($pages as $item)
                            <li class="nav-item"><a
                                    class="nav-link {{ (request()->is($item->slug)) ? 'active' : '' }}"
                                    href="{{ url($item->slug) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- Main navbar END -->

                <!-- Nav right START -->
                <div class="nav ms-3 flex-nowrap align-items-center">
                    <!-- Nav Button -->
                    <div class="nav-item d-none d-md-block">
                        <a href="#" class="btn btn-sm btn-primary mb-0 mx-2">Daftar Sekarang</a>
                    </div>
                </div>
                <!-- Nav right END -->
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="pt-5 mt-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-7 mx-auto text-center">
                    {{-- <!-- Logo -->
                    <img class="light-mode-item mx-auto w-75" src="{{ asset('logo') }}/logo.png"
                        alt="logo">
                    <img class="dark-mode-item mx-auto w-75" src="{{ asset('logo') }}/logo.png"
                        alt="logo"> --}}
                    <div class="mt-2">©{{ date('Y') }} <a class="text-reset btn-link"
                            target="_blank">alfikepri.com</a>. All rights reserved </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

    @include('includes/frontend/scripts')

</body>

</html>
