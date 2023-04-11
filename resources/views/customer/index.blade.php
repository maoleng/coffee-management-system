@extends('customer-theme.master')

@section('content')
    <main>
        <!-- hero area start -->
        <section class="hero__area hero__area--2 position-relative custom-padding">
            <span class="shape shape__1 position-absolute"><img src="{{ asset('customer-assets/images/shape/hero-shape-2-1.png') }}" alt=""></span>
            <span class="shape shape__2 position-absolute"><img src="{{ asset('customer-assets/images/shape/hero-shape-2-2.png') }}" alt=""></span>
            <div class="container-fluid custom-width">
                <div class="row mm-reverse">
                    <div class="col-xl-6 col-lg-7 align-self-center">
                        <div class="hero__content hero__content--2 position-relative">
                            <h1 class="title mb-10">Distinct <br>
                                coffee aroma</h1>
                            <p>The coffee is brewed by first roasting the green coffee beans over hot <br> coals in a brazier. given an opportunity to sample.</p>
                            <div class="btns mt-45 d-flex align-items-center justify-content-start">
                                <a href="about.html" class="site-btn site-btn__2">testy Coffee</a>
                                <a href="contact.html" class="site-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="hero__thumb hero__thumb--2 position-relative">
                            <img src="{{ asset('customer-assets/images/hero/hero-img-2-1.png') }}" alt="img">
                            <a href="//www.youtube.com/embed/4xe72U7mXNg?rel=0&amp;controls=0&amp;showinfo=0" data-rel="lightcase:myCollection" data-animation="fadeInLeft" class="video-btn video-btn__2 d-flex align-items-center"><i class="fas fa-play"></i><span class="border-effect">play video</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero area end -->

        <!-- feature slider start -->
        <div class="feature__area feature__area--2 pb-115">
            <div class="container-fluid custom-width">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="feature__wrapper">
                            <div class="row mt-none-50">
                                <div class="col-xl-3 col-lg-6 col-md-6 mt-50">
                                    <div class="feature__item feature__item--2">
                                        <span class="year">1992</span>
                                        <div class="content mt-20">
                                            <h2 class="title mb-10">How we Started</h2>
                                            <p>Curabitur semper erat a lacusey <br> sedn consequat, sit amet quamey.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 mt-50">
                                    <div class="feature__item feature__item--2">
                                        <span class="year">2002</span>
                                        <div class="content mt-20">
                                            <h2 class="title">Coffee Beans</h2>
                                            <p>Curabitur semper erat a lacusey <br> sedn consequat, sit amet quamey.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 mt-50">
                                    <div class="feature__item feature__item--2">
                                        <span class="year">2014</span>
                                        <div class="content mt-20">
                                            <h2 class="title">Family Work</h2>
                                            <p>Curabitur semper erat a lacusey <br> sedn consequat, sit amet quamey.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 mt-50">
                                    <div class="feature__item feature__item--2">
                                        <span class="year">2019</span>
                                        <div class="content mt-20">
                                            <h2 class="title">Bangladeshy Grades</h2>
                                            <p>Curabitur semper erat a lacusey <br> sedn consequat, sit amet quamey.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature slider end -->

        <!-- about area start -->
        <section class="about__area about__area--2 grey-bg position-relative pt-120 pb-130">
            <span class="shape shape__1 position-absolute"><img src="{{ asset('customer-assets/images/shape/about-shape-2-1.png') }}" alt=""></span>
            <span class="shape shape__2 position-absolute"><img src="{{ asset('customer-assets/images/shape/about-shape-2-2.png') }}" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7">
                        <div class="about__left about__left--2 position-relative">
                            <img class="big" src="{{ asset('customer-assets/images/about/about-img-2-1.png') }}" alt="img">
                            <img class="small position-absolute" src="{{ asset('customer-assets/images/about/about-img-2-2.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1">
                        <div class="about__right about__right--2 pl-45 pt-45">
                            <div class="section-heading section-heading__black">
                                <span class="sub-title">about us</span>
                                <h2 class="title mb-25">one of the best coffee house
                                    in your home town</h2>
                                <p>Mauris rhoncus orci in imperdiet placerat. Vestibulum euismod nisl suscipit ligula volutpat, a feugiat urna maximus. Cras massa nibhtincidunt.</p>
                                <p>Donec et nibh maximus, congue est eu, mattis nunc. Praesent ut quam quis quam venenatis fringilla. Morbi vestibulum id tellus mmodo mattis. Aliquam erat volutpat. Aenean accumsan id mi nec semper. Lorem ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- populer menu area start -->
        <section class="popular-menu__area grey-bg position-relative pb-120">
            <span class="shape shape__1 position-absolute"><img src="{{ asset('customer-assets/images/shape/menu-shape-1.png') }}" alt=""></span>
            <span class="shape shape__2 position-absolute"><img src="{{ asset('customer-assets/images/shape/menu-shape-2.png') }}" alt=""></span>
            <span class="shape shape__3 position-absolute"><img src="{{ asset('customer-assets/images/shape/menu-shape-3.png') }}" alt=""></span>
            <span class="shape shape__4 position-absolute"><img src="{{ asset('customer-assets/images/shape/menu-shape-4.png') }}" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading section-heading__black mb-40">
                            <span class="sub-title">Special menu</span>
                            <h2 class="title">Cafena Popular Menu</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="popular-menu__wrapper m-auto d-inline-block">
                            <div class="popular-menu__filter d-flex justify-content-center align-items-center mb-55">
                                <button class="active" data-filter="*">All</button>
                                @foreach ($categories as $category)
                                    <button data-filter=".{{ $category->id }}">{{ $category->name }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popular-menu-grid" class="row popular-menu__grid mt-none-30">
                    <div class="col-xl-4 col-lg-6 col-md-6 grid-sizer"></div>
                    @foreach ($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6 grid-item {{ $product->category_id }} mt-30">
                            <div class="popular-menu__item">
                                <div class="popular-menu__thumb">
                                    <img src="{{ $product->images[0]->path }}" alt="">
                                </div>
                                <div class="popular-menu__content text-center">
                                    <h2 class="title">
                                        <a href="product-details.html">{{ $product->name }}</a>
                                    </h2>
                                    <div class="pp__price d-flex align-items-center justify-content-center">
                                        <h6 class="label">Price - </h6>
                                        <span class="price"> {{ prettyPrice($product->price) }}</span></span>
                                    </div>
                                    <div class="pp__action pp__action--2 mt-15 d-flex align-items-center justify-content-center">
                                        <div class="cart d-flex align-items-center justify-content-center">
                                            <a href="#0"><i class="fal fa-shopping-basket"></i></a>
                                        </div>
                                        <div data-product_id="{{ $product->id }}" class="view d-flex align-items-center justify-content-center">
                                            <a href="#0"><i class="fal fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @foreach ($products as $product)
        <div id="{{ $product->id }}" class="product-popup product-popup-1">
            <div class="view-background">
                <div class="row">
                    <div class="col-md-4 align-self-center">
                        <div class="quickview d-flex align-items-center justify-content-center">
                            <div class="quickview__thumb">
                                <img src="{{ $product->images[0]->path }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="viewcontent">
                            <div class="viewcontent__header">
                                <h2>{{ $product->name }}</h2>
                                <a class="view_close product-p-close" href="javascript:void(0)"><i class="fal fa-times"></i></a>
                            </div>
                            <div class="viewcontent__price">
                                <h4>{{ prettyPrice($product->price) }}</h4>
                            </div>
                            <div class="viewcontent__stock">
                                <h4>Available :<span> In stock</span></h4>
                            </div>
                            <div class="viewcontent__details">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="viewcontent__action">
                                <span>Qty</span>
                                <input type="number" placeholder="1">
                                <a class="site-btn" href="#">add to cart</a>
                            </div>
                            <div class="viewcontent__footer">
                                <ul class="list-unstyled">
                                    <li>Category:</li>
                                    <li>Expire month:</li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li>{{ $product->category->name }}</li>
                                    <li>{{ $product->expire_month }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <section class="topgrade__area topgrade__area--2 grey-bg pt-115 pb-115 position-relative">
            <span class="shape shape__1 position-absolute"><img src="{{ asset('customer-assets/images/shape/top-grade-shape-2-1.png') }}" alt=""></span>
            <span class="shape shape__2 position-absolute"><img src="{{ asset('customer-assets/images/shape/top-grade-shape-2-2.png') }}" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="section-heading section-heading__black mb-55">
                            <span class="sub-title">top grade</span>
                            <h2 class="title">world top Grade</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-none-30">
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
                        <div class="topgrade__item topgrade__item--2 text-center">
                            <div class="thumb">
                                <img src="{{ asset('customer-assets/images/top-grade/tg-2-1.jpeg') }}" alt="">
                                <span class="count">01</span>
                            </div>
                            <div class="content mt-20">
                                <h2 class="title">Americano Grade</h2>
                                <p>Curabitur semper erat a lacusey<br> consequat, sit amet quam </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-85">
                        <div class="topgrade__item topgrade__item--2 text-center">
                            <div class="thumb">
                                <img src="{{ asset('customer-assets/images/top-grade/tg-2-2.jpeg') }}" alt="">
                                <span class="count">02</span>
                            </div>
                            <div class="content mt-20">
                                <h2 class="title">arebica Green</h2>
                                <p>Curabitur semper erat a lacusey<br> consequat, sit amet quam </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
                        <div class="topgrade__item topgrade__item--2 text-center">
                            <div class="thumb">
                                <img src="{{ asset('customer-assets/images/top-grade/tg-2-3.jpeg') }}" alt="">
                                <span class="count">03</span>
                            </div>
                            <div class="content mt-20">
                                <h2 class="title">Mixed Rosted</h2>
                                <p>Curabitur semper erat a lacusey<br> consequat, sit amet quam </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-85">
                        <div class="topgrade__item topgrade__item--2 text-center">
                            <div class="thumb">
                                <img src="{{ asset('customer-assets/images/top-grade/tg-2-4.jpeg') }}" alt="">
                                <span class="count">04</span>
                            </div>
                            <div class="content mt-20">
                                <h2 class="title">Robasta Rosted</h2>
                                <p>Curabitur semper erat a lacusey<br> consequat, sit amet quam </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="blog__area blog__area--2 position-relative pt-115 pb-120">
            <span class="shape shape__1">
                <img src="{{ asset('customer-assets/images/shape/blog-shape-2-1.png') }}" alt="">
            </span>
            <span class="shape shape__2">
                <img src="{{ asset('customer-assets/images/shape/blog-shape-2-2.png') }}" alt="">
            </span>
            <div class="container">
                <div class="row align-items-end mb-60">
                    <div class="col-lg-8">
                        <div class="section-heading section-heading__black">
                            <span class="sub-title">News & Blog</span>
                            <h2 class="title">Latest news & Blog</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="btns-wrapper text-center text-lg-end">
                            <a href="about.html" class="site-btn">learn more</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-none-30">
                    @foreach ($posts as $post)
                        <div class="col-xl-4 col-lg-6 col-md-6 mt-30">
                        <article class="blog__item blog__item--2">
                            <div class="thumb position-relative">
                                <div class="img">
                                    <img src="{{ $post->banner }}" alt="">
                                </div>
                            </div>
                            <div class="content content__2">
                                <ul class="blog__meta blog__meta--2 list-unstyled d-flex align-items-center justify-content-start">
                                    <li><span>By: </span> {{ $post->admin->name }}</li>
                                </ul>
                                <h3 class="blog__title blog__title--2 border-effect">
                                    <a href="blog-details.html">{{ $post->limitTitle }}</a>
                                </h3>
                                <div class="btn-wrapper mt-15 d-flex justify-content-between">
                                    <a href="blog-details.html" class="read-more read-more__2">Read more <i class="fa fa-long-arrow-right"></i></a>
                                    <a href="#0" class="share-btn"><i class="fal fa-share-alt"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection

@section('custom_script')
    <script>
        $(document).ready(function() {
            $('.view').on('click',function() {
                const product_id = $(this).data('product_id')
                $('.overlay').addClass('show-popup')
                $(`#${product_id}`).addClass('show-popup')
            })
        })
    </script>
@endsection
