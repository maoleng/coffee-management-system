@extends('customer-theme.master')

@section('content')
<div class="h1-hero-section section">
    <div class="hero-slider hero-slider-1 swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-slide-1 bg-light">
                <div class="container">
                    <div class="row align-items-center mb-n6">
                        <div class="col-lg-6 col-sm-7 col-12 mb-6">
                            <div class="hero-slide-1-content">
                                <h5 class="hero-slide-1-sub-title">Black coffee is awesome.</h5>
                                <h2 class="hero-slide-1-title">TIME DISCOVER <br> COFFEE HOUSE</h2>
                                <p class="hero-slide-1-text">Experience the decibels like your ears deserve to. Safe for the ears, very for the heart. A treat to your ears.</p>
                                <div class="hero-slide-1-button">
                                    <a href="shop-left-sidebar.html" class="btn btn-primary btn-dark-hover">Explore More <i class="sli-basket-loaded"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-12 mb-6">
                            <div class="hero-slide-1-image"><img src="{{ asset('customer-assets/images/hero-slider/home-1/slide-1.webp') }}" alt="TIME DISCOVER COFFEE HOUSE" width="570" height="512"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide hero-slide-1 bg-light">
                <div class="container">
                    <div class="row align-items-center mb-n6">
                        <div class="col-lg-6 col-sm-7 col-12 mb-6">
                            <div class="hero-slide-1-content">
                                <h5 class="hero-slide-1-sub-title">Black coffee is awesome.</h5>
                                <h2 class="hero-slide-1-title">TIME DISCOVER <br> COFFEE HOUSE</h2>
                                <p class="hero-slide-1-text">Experience the decibels like your ears deserve to. Safe for the ears, very for the heart. A treat to your ears.</p>
                                <div class="hero-slide-1-button">
                                    <a href="shop-left-sidebar.html" class="btn btn-primary btn-dark-hover">Explore More <i class="sli-basket-loaded"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-12 mb-6">
                            <div class="hero-slide-1-image"><img src="{{ asset('customer-assets/images/hero-slider/home-1/slide-2.webp') }}" alt="TIME DISCOVER COFFEE HOUSE" width="570" height="633"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide hero-slide-1 bg-light">
                <div class="container">
                    <div class="row align-items-center mb-n6">
                        <div class="col-lg-6 col-sm-7 col-12 mb-6">
                            <div class="hero-slide-1-content">
                                <h5 class="hero-slide-1-sub-title">Black coffee is awesome.</h5>
                                <h2 class="hero-slide-1-title">TIME DISCOVER <br> COFFEE HOUSE</h2>
                                <p class="hero-slide-1-text">Experience the decibels like your ears deserve to. Safe for the ears, very for the heart. A treat to your ears.</p>
                                <div class="hero-slide-1-button">
                                    <a href="shop-left-sidebar.html" class="btn btn-primary btn-dark-hover">Explore More <i class="sli-basket-loaded"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-12 mb-6">
                            <div class="hero-slide-1-image"><img src="{{ asset('customer-assets/images/hero-slider/home-1/slide-3.webp') }}" alt="TIME DISCOVER COFFEE HOUSE" width="570" height="632"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev d-none d-md-flex"></div>
        <div class="swiper-button-next d-none d-md-flex"></div>
    </div>
</div>
<div class="h3-feature-section section section-padding pt-15">
    <div class="container">
        <div class="row row-cols-lg-2 row-cols-1 flex-lg-row-reverse mb-n8">
            <div class="col mb-8">
                <div class="section-title">
                    <h2 class="sub-title">FINEST INGREDIENTS</h2>
                    <p class="text">This is the perfect place to find a nice and cozy spot to sip some. You'll find the Java Jungle, Coffee Bean and more.</p>
                </div>
                <div class="feature-1">
                    <div class="feature-icon text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" data-inject-url="{{ asset('customer-assets/images/feature/one/coffee-pot.svg') }}" loading="lazy" width="50" height="50">
                            <path fill="currentColor" d="M772.9 299l-6.6-2.8H653.8l12.5-86-551.7-60.6 71 181.3c-75.2 66.6-123 164.3-123 273.7 0 95.1 36.1 181.3 94.9 246h527.7c58.8-64.7 95-150.9 95-246 0-86-29.6-165.1-79-227.4h50.3c31.4 17 171.9 110.4 85 376.1-7 20.9 2.9 44.2 21.9 51.7 4.1 1.7 8.3 2.4 12.5 2.4 14.9 0 29.1-10.1 34.3-26.7 96.2-293.9-44.5-443.5-132.3-481.7zm-55.4 186.1c-1.7-1.1-2.9-2.3-4.8-3.4-4.3-2.6-9.6-4.4-17-5.8-89.9-16.6-191.8-10.4-268.1 16.4-91 32.1-198.4 35.9-303.5 10.7-1.4-.3-2.4-.5-3.5-.7 16.1-65.9 52.5-123.4 102.2-165.6h396.7c14.7 12.3 28.2 25.5 40.2 40.3 25.8 31.4 45.6 68 57.8 108.1z"></path>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title">Coffeemaker</h3>
                        <p class="feature-text">This is the perfect place to find a nice and cozy spot to sip some.</p>
                    </div>
                </div>
                <div class="feature-1">
                    <div class="feature-icon text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" data-inject-url="{{ asset('customer-assets/images/feature/one/coffee-mug.svg') }}" loading="lazy" width="50" height="50">
                            <path fill="currentColor" d="M321.3 172.7c23.4-1.8 46.7-6.1 66.4-10 6.5-1.3 12.9-2.5 19.3-3.9 10-2 20-4 29.8-6l1.5-.3c2.5-.5 5.5-1.1 8.6-1.8 3.2-.7 6.6-1.4 9.6-2-6 2.5-13.1 5.3-19.5 7.7-13 5-26.3 10.2-35.9 14.6l-1.8.8c-18.5 8.4-46.5 21.1-51.7 43.9-2.1 8.8 0 17.9 5.8 25.1 6.1 7.6 15.4 12 25 11.7 3.3-.1 6.9-.3 10.8-1 6.2-1.2 12.3-3 17.9-5.3 29.4-12.1 31.2-4.2 31.4-3.3 1.1 5.2-7.2 16.2-10.8 20.8-.8 1.1-1.4 1.8-1.8 2.5-.9 1.3-2 2.7-3.2 4.3-7.2 9.5-17.1 22.6-13.3 34 .4 1.4 1.8 2.2 3.2 1.9h.1c1.4-.4 2.4-1.7 2.2-3.2-.6-4.9 3.2-10.1 6.9-14.4 3.5-4.2 7.4-8.2 11.1-12.1 1.6-1.7 3.2-3.2 4.6-4.9l.1-.1c6.8-7.3 18.3-19.4 17.9-31.2-.2-4.7-2.2-8.9-6-12.4-10.7-9.8-26.1-7.7-39.6-5.1l-1.1.3-7.3 1.6-7.5 1.6c-4.4.9-7.9 1.4-11.1 1.6-6.6.4-9.4-2.6-8.4-5.4 3-8.4 23.9-19.4 63-32.6 2.1-.7 3.8-1.3 4.9-1.7 2.4-.9 4.8-1.8 7.2-2.5 13.8-4.9 28.1-10 41.3-17 23.5-12.3 25.9-25.9 23.5-35.4v-.2l-.1-.3c0-.2-.1-.4-.2-.5-3.1-9.7-11.6-16.5-23.5-18.6-17.1-3-35.6.6-52.1 3.8l-4.3.8c-14 2.7-28.3 5.8-42 8.8-12 2.6-24.4 5.4-36.7 7.8s-23.1 4.2-33.2 5.6c-7.7 1.1-17 2.2-26.3 2.3-7.1.1-15.9.2-22.3-3.3-5.8-3.2-2.5-13.4.1-18.3 7.7-15 24.6-23.8 40.1-30.5C328 84.9 344 80 364 75.6c12.9-2.8 25.5-5 37.5-6.4h.3c1.6-.3 2.5-1.8 2.3-3.3-.3-1.4-1.4-2.3-2.8-2.3-24.2-2.1-49.4-.7-72.5 3.9-7.2 1.4-14.3 3.2-21.1 5.2-26.2 7.7-58.5 24.1-63.8 57.6-1.8 11.4.6 20.7 7.2 27.8 14.5 15.5 46.1 16.6 70.2 14.6zm530.7 266c-29.6-33.7-77.3-52.8-138.4-55.7-7.4-34.2-34.2-59.7-66.4-59.7H183.4c-37.8 0-68.4 35-68.4 78.2v405c0 41 27.6 74.5 62.6 78V922c0 8.7 7 15.7 15.7 15.7h444.2c8.7 0 15.7-7 15.7-15.7v-37.5c35.1-3.4 62.6-36.9 62.6-78V750c48-12.8 88.8-40.3 120.2-81.4 31.7-41.6 42.2-82.4 43.3-87l.3-1c12.5-58.9 3.3-106.7-27.6-141.9zm-64.6 124c-.8 2.9-8.5 29.5-28.2 55.3-12.6 16.5-27.1 29.1-43.6 37.8V470.7c22.4 1.8 49.6 7.4 63.6 23.4 12.2 13.9 15 37 8.2 68.6z"></path>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title">Coffee Grinder</h3>
                        <p class="feature-text">This is the perfect place to find a nice and cozy spot to sip some.</p>
                    </div>
                </div>
                <div class="feature-1">
                    <div class="feature-icon text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" data-inject-url="{{ asset('customer-assets/images/feature/one/coffee-alt.svg') }}" loading="lazy" width="50" height="50">
                            <path fill="currentColor" d="M499.8 631.2c-51.3 0-95.1-25-117.9-60.4h-85.6l39.1 327.5h320.2l38.6-327.5h-76.6c-22.7 35.3-67.1 60.4-117.8 60.4zM340.2 937.5H651l2.6-23.4h-316l2.6 23.4zM744 134.1h-16.7c-8.5-.4-34.1-4.7-45.4-40.8h-.2c-3.1-17.6-18.2-30.8-36.1-30.8h-298c-17.9 0-32.8 13.2-36.1 30.8-11.6 36.1-36.9 40.3-45.6 40.8h-10.4c-20.5 0-36.9 17.1-36.9 37.8v15.5c0 20.8 16.4 37.9 36.9 37.9l28.1 236.3h98.1c22.9-35.8 66.8-60.2 118-60.2 51 0 95 24.4 118 60.2h89.6l28-236.2h8.7c20.2 0 36.8-17.1 36.8-37.9V172c0-20.9-16.5-37.9-36.8-37.9zm-207 3h-74.6c-8.9 0-15.9-7.4-15.9-16.4 0-9.2 7-16.4 15.9-16.4H537c8.9 0 15.9 7.3 15.9 16.4 0 9-7.1 16.4-15.9 16.4zm-37.2 468.7c58.3 0 105.7-40.2 105.7-89.7 0-49.4-47.4-89.8-105.7-89.8-58.4 0-106.1 40.3-106.1 89.8s47.7 89.7 106.1 89.7z"></path>
                        </svg>
                    </div>
                    <div class="feature-content">
                        <h3 class="feature-title">Coffee Cups</h3>
                        <p class="feature-text">This is the perfect place to find a nice and cozy spot to sip some.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-8">
                <img loading="lazy" src="{{ asset('customer-assets/images/feature/one/feature-image-2.webp') }}" alt="feature image" width="570" height="632">
            </div>
        </div>
    </div>
</div>
<div class="h3-feature-section section section-padding">
    <div class="container">
        <div class="section-title section-title-center">
            <p class="title">What Happens Here</p>
            <h2 class="sub-title">EXPLORE KOFI SERVICE</h2>
        </div>
        <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 mb-n6">
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-1.webp') }}" alt="Coffee World sorts" width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">Coffee World sorts</h3>
                        <p class="feature-text">This is the perfect place to find a nice and cozy spot to sip some.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-2.webp') }}" alt="Sed sagittis sodales" width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">Sed sagittis sodales</h3>
                        <p class="feature-text">Coffee Bean and more shops right in this website.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-3.webp') }}" alt="Curabitur in eleifend" width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">Curabitur in eleifend</h3>
                        <p class="feature-text">Find the Java Jungle, Coffee Bean and more shops right in this website.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-4.webp') }}" alt="Eleifend vehicula odio." width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">Eleifend vehicula odio.</h3>
                        <p class="feature-text">Perfect place to find a nice and some more shops right in this website.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-5.webp') }}" alt="The best World sorts" width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">The best World sorts</h3>
                        <p class="feature-text">The perfect place to find a nice and cozy spot to sip some. You'll find the Java.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-6">
                <div class="feature-2">
                    <div class="feature-icon"><img loading="lazy" src="{{ asset('customer-assets/images/feature/two/feature-6.webp') }}" alt="Sodales lobortis sorts" width="80" height="80"></div>
                    <div class="feature-content">
                        <h3 class="feature-title">Sodales lobortis sorts</h3>
                        <p class="feature-text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="h1-product-section section section-padding pt-0">
    <div class="container">
        <div class="section-title section-title-center">
            <p class="title">What Happens Here</p>
            <h2 class="sub-title">FEATURED COLLECTION</h2>
        </div>
        <div class="product-carousel swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="product-image"><img loading="lazy" src="{{ asset('customer-assets/images/products/product-1.webp') }}" alt="House Coffee Original" width="268" height="306"></a>
                            <div class="product-badge-left">
                                <span class="product-badge-new">new</span>
                            </div>
                            <div class="product-badge-right">
                                <span class="product-badge-sale">sale</span>
                                <span class="product-badge-sale">-15%</span>
                            </div>
                            <div class="product-action">
                                <button class="product-action-btn" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"><i class="sli-magnifier"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to wishlist"><i class="sli-heart"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Compare"><i class="sli-refresh"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to cart"><i class="sli-bag"></i></button>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="product-details.html">House Coffee Original</a></h5>
                            <div class="product-price"><del>$130.00</del>$110.00</div>
                            <div class="product-rating">
                                <span class="product-rating-bg"><span class="product-rating-active" style="width: 90%;"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="product-image"><img loading="lazy" src="{{ asset('customer-assets/images/products/product-2.webp') }}" alt="Medium Roast Ground Coffee" width="268" height="306"></a>
                            <div class="product-badge-right">
                                <span class="product-badge-sale">sale</span>
                                <span class="product-badge-sale">-10%</span>
                            </div>
                            <div class="product-action">
                                <button class="product-action-btn" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"><i class="sli-magnifier"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to wishlist"><i class="sli-heart"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Compare"><i class="sli-refresh"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to cart"><i class="sli-bag"></i></button>
                            </div>
                            <div class="product-variation">
                                <div class="product-variation-type">
                                    <button class="product-variation-type-btn" data-tooltip-text="White"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-1.webp') }}" alt="white" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Gold"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-2.webp') }}" alt="gold" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Black"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-3.webp') }}" alt="black" width="23" height="23"></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="product-details.html">Medium Roast Ground Coffee</a></h5>
                            <div class="product-price"><del>$21.00</del>$19.00</div>
                            <div class="product-rating">
                                <span class="product-rating-bg"><span class="product-rating-active" style="width: 80%;"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="product-image"><img loading="lazy" src="{{ asset('customer-assets/images/products/product-3.webp') }}" alt="Premium Roast Coffee" width="268" height="306"></a>
                            <div class="product-action">
                                <button class="product-action-btn" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"><i class="sli-magnifier"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to wishlist"><i class="sli-heart"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Compare"><i class="sli-refresh"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to cart"><i class="sli-bag"></i></button>
                            </div>
                            <div class="product-variation">
                                <div class="product-variation-type">
                                    <button class="product-variation-type-btn" data-tooltip-text="White"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-1.webp') }}" alt="white" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Gold"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-2.webp') }}" alt="gold" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Black"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-3.webp') }}" alt="black" width="23" height="23"></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="product-details.html">Premium Roast Coffee</a></h5>
                            <div class="product-price">$39.00</div>
                            <div class="product-rating">
                                <span class="product-rating-bg"><span class="product-rating-active" style="width: 100%;"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="product-image"><img loading="lazy" src="{{ asset('customer-assets/images/products/product-4.webp') }}" alt="Signature Blend Roast Coffee" width="268" height="306"></a>
                            <div class="product-badge-right">
                                <span class="product-badge-sale">sale</span>
                                <span class="product-badge-sale">-11%</span>
                            </div>
                            <div class="product-action">
                                <button class="product-action-btn" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"><i class="sli-magnifier"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to wishlist"><i class="sli-heart"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Compare"><i class="sli-refresh"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to cart"><i class="sli-bag"></i></button>
                            </div>
                            <div class="product-variation">
                                <div class="product-variation-type">
                                    <button class="product-variation-type-btn" data-tooltip-text="White"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-1.webp') }}" alt="white" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Gold"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-2.webp') }}" alt="gold" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Black"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-3.webp') }}" alt="black" width="23" height="23"></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="product-details.html">Signature Blend Roast Coffee</a></h5>
                            <div class="product-price"><del>$110.00</del>$99.00</div>
                            <div class="product-rating">
                                <span class="product-rating-bg"><span class="product-rating-active" style="width: 75%;"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="product-image"><img loading="lazy" src="{{ asset('customer-assets/images/products/product-5.webp') }}" alt="Supreme Dark Roast Coffee" width="268" height="306"></a>
                            <div class="product-badge-left">
                                <span class="product-badge-new">new</span>
                            </div>
                            <div class="product-action">
                                <button class="product-action-btn" data-tooltip-text="Quick View" data-bs-toggle="modal" data-bs-target="#exampleProductModal"><i class="sli-magnifier"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to wishlist"><i class="sli-heart"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Compare"><i class="sli-refresh"></i></button>
                                <button class="product-action-btn" data-tooltip-text="Add to cart"><i class="sli-bag"></i></button>
                            </div>
                            <div class="product-variation">
                                <div class="product-variation-type">
                                    <button class="product-variation-type-btn" data-tooltip-text="White"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-1.webp') }}" alt="white" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Gold"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-2.webp') }}" alt="gold" width="23" height="23"></button>
                                    <button class="product-variation-type-btn" data-tooltip-text="Black"><img loading="lazy" src="{{ asset('customer-assets/images/products/variation/type/type-3.webp') }}" alt="black" width="23" height="23"></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h5 class="product-title"><a href="product-details.html">Supreme Dark Roast Coffee</a></h5>
                            <div class="product-price">$80.00</div>
                            <div class="product-rating">
                                <span class="product-rating-bg"><span class="product-rating-active" style="width: 90%;"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination d-md-none"></div>
            <div class="swiper-button-prev d-none d-md-flex"></div>
            <div class="swiper-button-next d-none d-md-flex"></div>
        </div>
    </div>
</div>
<div class="h1-blog-section section section-padding pt-0">
    <div class="container">
        <div class="section-title section-title-center">
            <p class="title">What Happens Here</p>
            <h2 class="sub-title">FEATURED BLOG</h2>
        </div>
        <div class="blog-carousel swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="blog">
                        <a href="blog-details-left-sidebar.html" class="blog-thumb"><img loading="lazy" src="{{ asset('customer-assets/images/blog/blog-1.webp') }}" alt="Watch misni sdedn nises" width="348" height="232"></a>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details-left-sidebar.html">Watch misni sdedn nises</a></h4>
                            <ul class="blog-meta">
                                <li>14 November, 2023</li>
                                <li><a href="blog-details-left-sidebar.html">0 Comments</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                            <a href="blog-details-left-sidebar.html" class="btn">Explore More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="blog">
                        <a href="blog-details-left-sidebar.html" class="blog-thumb"><img loading="lazy" src="{{ asset('customer-assets/images/blog/blog-2.webp') }}" alt="Jininsi smart watch mnisyh nise" width="348" height="232"></a>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details-left-sidebar.html">Jininsi smart watch mnisyh nise</a></h4>
                            <ul class="blog-meta">
                                <li>14 November, 2023</li>
                                <li><a href="blog-details-left-sidebar.html">0 Comments</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                            <a href="blog-details-left-sidebar.html" class="btn">Explore More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="blog">
                        <a href="blog-details-left-sidebar.html" class="blog-thumb"><img loading="lazy" src="{{ asset('customer-assets/images/blog/blog-3.webp') }}" alt="Minis mnies anide ewnis" width="348" height="232"></a>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details-left-sidebar.html">Minis mnies anide ewnis</a></h4>
                            <ul class="blog-meta">
                                <li>14 November, 2023</li>
                                <li><a href="blog-details-left-sidebar.html">0 Comments</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                            <a href="blog-details-left-sidebar.html" class="btn">Explore More</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="blog">
                        <a href="blog-details-left-sidebar.html" class="blog-thumb"><img loading="lazy" src="{{ asset('customer-assets/images/blog/blog-4.webp') }}" alt="Smgori tuin nibes kninwe" width="348" height="232"></a>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details-left-sidebar.html">Smgori tuin nibes kninwe</a></h4>
                            <ul class="blog-meta">
                                <li>14 November, 2023</li>
                                <li><a href="blog-details-left-sidebar.html">0 Comments</a></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                            <a href="blog-details-left-sidebar.html" class="btn">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination d-md-none"></div>
            <div class="swiper-button-prev d-none d-md-flex"></div>
            <div class="swiper-button-next d-none d-md-flex"></div>
        </div>
    </div>
</div>
<div class="quickview-product-modal modal fade" id="exampleProductModal">
    <div class="modal-dialog modal-dialog-centered mw-100">
        <div class="container">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <!-- Single Product Top Area Start -->
                    <div class="row row-cols-md-2 row-cols-1 mb-n6">
                        <!-- Product Image Start -->
                        <div class="col mb-6">
                            <div class="single-product-image">
                                <!-- Product Badge Start -->
                                <div class="single-product-badge-left">
                                    <span class="single-product-badge-new">new</span>
                                </div>
                                <div class="single-product-badge-right">
                                    <span class="single-product-badge-sale">sale</span>
                                    <span class="single-product-badge-sale">-11%</span>
                                </div>
                                <!-- Product Badge End -->
                                <!-- Product Image Slider Start -->
                                <div class="quickview-product-image-slider swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-1.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-2.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-3.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-4.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                    </div>
                                    <div class="swiper-pagination d-none"></div>
                                    <div class="swiper-button-prev d-none"></div>
                                    <div class="swiper-button-next d-none"></div>
                                </div>
                                <!-- Product Image Slider End -->
                                <!-- Product Thumbnail Carousel Start -->
                                <div class="quickview-product-thumb-carousel swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-1.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-2.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-3.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                        <div class="swiper-slide"><img loading="lazy" src="{{ asset('customer-assets/images/products/single/single-product-4.webp') }}" alt="Signature Blend Roast Coffee"></div>
                                    </div>
                                    <div class="swiper-pagination d-none"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                                <!-- Product Thumbnail Carousel End -->
                            </div>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="col mb-6">
                            <div class="single-product-content">
                                <h1 class="single-product-title">Signature Blend Roast Coffee</h1>
                                <div class="single-product-price">$99.00 <del>$110.00</del></div>
                                <ul class="single-product-meta">
                                    <li><span class="label">Availability :</span> <span class="value">11 Left in Stock</span></li>
                                </ul>
                                <div class="single-product-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                </div>
                                <ul class="single-product-variations">
                                    <li>
                                        <span class="label">Size :</span>
                                        <div class="value">
                                            <div class="single-product-variation-size-wrap">
                                                <div class="single-product-variation-size-item"><input type="radio" name="qv-size" id="qv-size-s" checked><label for="qv-size-s">s</label></div>
                                                <div class="single-product-variation-size-item"><input type="radio" name="qv-size" id="qv-size-m"><label for="qv-size-m">m</label></div>
                                                <div class="single-product-variation-size-item"><input type="radio" name="qv-size" id="qv-size-l"><label for="qv-size-l">l</label></div>
                                                <div class="single-product-variation-size-item"><input type="radio" name="qv-size" id="qv-size-xl"><label for="qv-size-xl">xl</label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="label">Color :</span>
                                        <div class="value">
                                            <div class="single-product-variation-color-wrap">
                                                <div class="single-product-variation-color-item"><input type="radio" name="qv-color" id="qv-color-purple" checked><label for="qv-color-purple" style="background-color: purple;">purple</label></div>
                                                <div class="single-product-variation-color-item"><input type="radio" name="qv-color" id="qv-color-violet"><label for="qv-color-violet" style="background-color: violet;">violet</label></div>
                                                <div class="single-product-variation-color-item"><input type="radio" name="qv-color" id="qv-color-black"><label for="qv-color-black" style="background-color: black;">black</label></div>
                                                <div class="single-product-variation-color-item"><input type="radio" name="qv-color" id="qv-color-pink"><label for="qv-color-pink" style="background-color: pink;">pink</label></div>
                                                <div class="single-product-variation-color-item"><input type="radio" name="qv-color" id="qv-color-orange"><label for="qv-color-orange" style="background-color: orange;">orange</label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="label">Material :</span>
                                        <div class="value">
                                            <div class="single-product-variation-material-wrap">
                                                <div class="single-product-variation-material-item"><input type="radio" name="qv-material" id="qv-material-metal" checked><label for="qv-material-metal">metal</label></div>
                                                <div class="single-product-variation-material-item"><input type="radio" name="qv-material" id="qv-material-resin"><label for="qv-material-resin">resin</label></div>
                                                <div class="single-product-variation-material-item"><input type="radio" name="qv-material" id="qv-material-leather"><label for="qv-material-leather">leather</label></div>
                                                <div class="single-product-variation-material-item"><input type="radio" name="qv-material" id="qv-material-slag"><label for="qv-material-slag">slag</label></div>
                                                <div class="single-product-variation-material-item"><input type="radio" name="qv-material" id="qv-material-fiber"><label for="qv-material-fiber">fiber</label></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="single-product-actions">
                                    <div class="single-product-actions-item">
                                        <div class="product-quantity-count">
                                            <button class="dec qty-btn">-</button>
                                            <input class="product-quantity-box" type="text" name="quantity" value="1">
                                            <button class="inc qty-btn">+</button>
                                        </div>
                                    </div>
                                    <div class="single-product-actions-item"><button class="btn btn-dark btn-primary-hover rounded-0">ADD TO CART</button></div>
                                    <div class="single-product-actions-item"><button class="btn btn-icon btn-light btn-primary-hover rounded-0"><i class="sli-heart"></i></button></div>
                                    <div class="single-product-actions-item"><button class="btn btn-icon btn-light btn-primary-hover rounded-0"><i class="sli-refresh"></i></button></div>
                                </div>
                                <ul class="single-product-meta">
                                    <li><span class="label">Categories :</span> <span class="value links">
                                                <a href="#">Coffee</a>
                                                <a href="#">Deal Collection</a>
                                                <a href="#">Featured Products</a>
                                                <a href="#">Green coffee</a>
                                                <a href="#">Italian</a>
                                                </span>
                                    </li>
                                    <li><span class="label">Tags :</span> <span class="value links">
                                                <a href="#">black</a>
                                                <a href="#">fiber</a>
                                                <a href="#">leather</a>
                                                </span>
                                    </li>
                                    <li><span class="label">Share :</span> <span class="value social">
                                                <a href="#"><img src="{{ asset('customer-assets/images/icons/social/facebook.webp') }}" alt="facebook"></a>
                                                <a href="#"><img src="{{ asset('customer-assets/images/icons/social/twitter.webp') }}" alt="twitter"></a>
                                                <a href="#"><img src="{{ asset('customer-assets/images/icons/social/pinterest.webp') }}" alt="pinterest"></a>
                                                </span>
                                    </li>
                                </ul>
                                <div class="single-product-safe-payment">
                                    <p>Guaranteed safe checkout</p>
                                    <img src="{{ asset('customer-assets/images/footer/footer-payment.webp') }}" alt="payment">
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product Top Area End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
