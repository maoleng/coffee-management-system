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
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 align-self-center">
                    <div class="menu-area__right menu-area__right--3 menu-area__right--4 d-flex justify-content-end align-items-center">

                        <div class="main-menu main-menu__3 main-menu__4">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('support') }}">Contact</a></li>
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
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="main-menu main-menu__3 main-menu__4">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('product') }}">Product</a></li>
                                    <li><a href="{{ route('post') }}">Post</a></li>
                                    <li><a href="{{ route('support') }}">Contact</a></li>
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
