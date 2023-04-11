<header class="site-header site-header__3 site-header__4">
    <div class="menu-area menu-area__3 menu-area__4">
        <div class="container-fluid custom-width custom-width__2">
            <div class="row d-none d-xl-flex">
                <div class="col-xl-5 col-lg-4 col-md-5 align-self-center">
                    <div class="main-menu main-menu__3 main-menu__4">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('product') }}">Product</a></li>
                                <li><a href="{{ route('post') }}">Post</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 d-none d-lg-block text-center align-self-center">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('customer-assets/images/logo/logo-black.png') }}" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 align-self-center">
                    <div class="menu-area__right menu-area__right--3 menu-area__right--4 d-flex justify-content-end align-items-center">

                        <div class="main-menu main-menu__3 main-menu__4">
                            <nav>
                                <ul>
                                    <li><a href="reservation.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    @if (authed() === null)
                                        <li><a href="{{ route('auth.redirect') }}">Login</a></li>
                                    @else
                                        <li class="menu-item-has-children">
                                            <div class="thumb search__trigger item">
                                                <img width="50px" src="{{ authed()->avatar }}" alt="">
                                            </div>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('order_history') }}">Order History</a></li>
                                                <li><a href="{{ route('auth.logout') }}">Log out</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div id="btn-cart" class="cart cart-trigger item position-relative">
                                <i class="fa fa-shopping-basket"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-lg-flex d-xl-none">
                <div class="col-xl-9 col-lg-10 col-6">
                    <div class="wrapper-for-lg d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('customer-assets/images/logo/logo-black.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="main-menu main-menu__3 main-menu__4">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('product') }}">Product</a></li>
                                    <li><a href="{{ route('post') }}">Post</a></li>
                                    <li><a href="reservation.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    @if (authed() === null)
                                        <li><a href="{{ route('auth.redirect') }}">Login</a></li>
                                    @else
                                        <li class="menu-item-has-children">
                                            <div class="thumb search__trigger item">
                                                <img width="50px" src="{{ authed()->avatar }}" alt="">
                                            </div>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('auth.logout') }}">Log out</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-6 align-self-center">
                    <div class="menu-area__right menu-area__right--4  d-flex justify-content-end align-items-center">
                        <div class="cart cart-trigger item position-relative">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
