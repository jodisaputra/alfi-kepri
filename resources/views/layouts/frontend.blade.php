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
                    <img class="navbar-brand-item light-mode-item" src="{{ asset('logo') }}/logo.png"
                        alt="logo">
                    <img class="navbar-brand-item dark-mode-item"
                        src="{{ asset('logo') }}/logo.png" alt="logo">
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

                        <li class="nav-item"> <a class="nav-link {{ (strpos(Route::currentRouteName(), 'frontend.index') == 0) ? 'active' : '' }}" href="{{ route('frontend.index') }}">Beranda</a></li>

                        <!-- Nav item 1 Demos -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="tentangAlfi"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tentang Alfikepri</a>
                            <ul class="dropdown-menu" aria-labelledby="tentangAlfi">
                                <li> <a class="dropdown-item" href="index.html">Home default</a></li>
                                <li> <a class="dropdown-item" href="index-lazy.html">Home lazy load</a></li>
                                <li> <a class="dropdown-item" href="index-2.html">Magazine classic</a></li>
                                <li> <a class="dropdown-item" href="index-3.html">Magazine</a></li>
                                <li> <a class="dropdown-item active" href="index-4.html">Home cards</a></li>
                                <li> <a class="dropdown-item" href="index-5.html">Blog classic</a></li>
                                <li> <a class="dropdown-item" href="index-6.html">Blog Personal </a></li>
                                <li> <a class="dropdown-item" href="index-7.html">Blog Vintage</a></li>
                                <li> <a class="dropdown-item" href="index-8.html">Blog Tech</a></li>
                                <li> <a class="dropdown-item" href="index-9.html">Blog Fashion</a></li>
                                <li> <a class="dropdown-item" href="index-10.html">Blog Podcast</a></li>
                                <li> <a class="dropdown-item" href="index-11.html">Home Shop </a></li>
                            </ul>
                        </li>

                        <!-- Nav item 2 Pages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                                <li> <a class="dropdown-item" href="about-us.html">About</a></li>
                                <li> <a class="dropdown-item" href="contact-us.html">Contact</a></li>
                                <!-- Dropdown submenu -->
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#">Shop</a>
                                    <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                        <li> <a class="dropdown-item" href="shop-grid.html">Shop grid</a> </li>
                                        <li> <a class="dropdown-item" href="shop-detail.html">Shop detail</a> </li>
                                        <li> <a class="dropdown-item" href="checkout.html">Checkout</a> </li>
                                        <li> <a class="dropdown-item" href="my-cart.html">Cart</a> </li>
                                        <li> <a class="dropdown-item" href="empty-cart.html">Empty Cart</a> </li>
                                    </ul>
                                </li>
                                <!-- Dropdown submenu -->
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#">Other Archives</a>
                                    <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                        <li> <a class="dropdown-item" href="author.html">Author Page</a> </li>
                                        <li> <a class="dropdown-item" href="categories.html">Category page 1</a> </li>
                                        <li> <a class="dropdown-item" href="categories-2.html">Category page 2</a>
                                        </li>
                                        <li> <a class="dropdown-item" href="tag.html"># tag</a> </li>
                                        <li> <a class="dropdown-item" href="search-result.html">Search result</a>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a class="dropdown-item" href="404.html">Error 404</a></li>
                                <li> <a class="dropdown-item" href="signin.html">signin</a></li>
                                <li> <a class="dropdown-item" href="signup.html">signup</a></li>
                                <li> <a class="dropdown-item" href="offline.html">offline</a></li>
                                <!-- Dropdown submenu levels -->
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
                                    <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                        <!-- dropdown submenu open right -->
                                        <li class="dropdown-submenu dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#">Dropdown (end)</a>
                                            <ul class="dropdown-menu" data-bs-popper="none">
                                                <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                                <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                            </ul>
                                        </li>
                                        <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                        <!-- dropdown submenu open left -->
                                        <li class="dropdown-submenu dropstart">
                                            <a class="dropdown-item dropdown-toggle" href="#">Dropdown
                                                (start)</a>
                                            <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                                <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                                <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                            </ul>
                                        </li>
                                        <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    </ul>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                                        <i class="text-warning fa-fw bi bi-life-preserver me-2"></i>Support
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="docs/index.html" target="_blank">
                                        <i class="text-danger fa-fw bi bi-card-text me-2"></i>Documentation
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="https://blogzine.webestica.com/rtl"
                                        target="_blank">
                                        <i class="text-info fa-fw bi bi-toggle-off me-2"></i>RTL demo
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/"
                                        target="_blank">
                                        <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy blogzine!
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="postMenu"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Post</a>
                            <ul class="dropdown-menu" aria-labelledby="postMenu">
                                <!-- dropdown submenu -->
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#">Post grid</a>
                                    <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                        <li> <a class="dropdown-item" href="post-grid.html">Post grid</a> </li>
                                        <li> <a class="dropdown-item" href="post-grid-4-col.html">Post grid 4 col</a>
                                        </li>
                                        <li> <a class="dropdown-item" href="post-grid-masonry.html">Post grid
                                                masonry</a> </li>
                                        <li> <a class="dropdown-item" href="post-grid-masonry-filter.html">Post grid
                                                masonry filter</a> </li>
                                        <li> <a class="dropdown-item" href="post-large-and-grid.html">Post mixed large
                                                than grid</a> </li>
                                    </ul>
                                </li>
                                <li> <a class="dropdown-item" href="post-list.html">Post list</a> </li>
                                <li> <a class="dropdown-item" href="post-list-2.html">Post list 2</a> </li>
                                <li> <a class="dropdown-item" href="post-cards.html">Post card</a> </li>
                                <li> <a class="dropdown-item" href="post-overlay.html">Post Overlay</a> </li>
                                <li> <a class="dropdown-item" href="post-types.html">Post types</a> </li>
                                <li class="dropdown-divider"></li>
                                <li> <a class="dropdown-item" href="post-single.html">Post single magazine</a> </li>
                                <li> <a class="dropdown-item" href="post-single-2.html">Post single classic</a> </li>
                                <li> <a class="dropdown-item" href="post-single-3.html">Post single minimal</a> </li>
                                <li> <a class="dropdown-item" href="post-single-4.html">Post single card</a> </li>
                                <li> <a class="dropdown-item" href="post-single-5.html">Post single review</a> </li>
                                <li> <a class="dropdown-item" href="post-single-6.html">Post single video</a> </li>
                                <li> <a class="dropdown-item" href="podcast-single.html">Podcast single</a> </li>
                                <li class="dropdown-divider"></li>
                                <li> <a class="dropdown-item" href="pagination-styles.html">Pagination styles</a>
                                </li>
                            </ul>
                        </li>
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
