@extends('customer-theme.master')

@section('content')
    <main>
        <!-- breadcrumb area start -->
        <section class="breadcrumb-area pt-140 pb-140 bg_img" data-background="{{ asset('customer-assets/images/bg/breadcrumb-bg-1.jpeg') }}" data-overlay="dark" data-opacity="5">
            <div class="shape shape__1"><img src="{{ asset('customer-assets/images/shape/breadcrumb-shape-1.png') }}" alt=""></div>
            <div class="shape shape__2"><img src="{{ asset('customer-assets/images/shape/breadcrumb-shape-2.png') }}" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <h2 class="page-title">Recent Blog</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>Blog</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- blog area start -->
        <div class="blog-area pt-120 pb-105">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="blog__wrapper mt-none-30">
                            @foreach ($posts as $post)
                                <article class="blog__post format format-image mt-30">
                                <div class="thumb">
                                    <img src="{{ $post->banner }}" alt="">
                                </div>
                                <ul class="meta mt-20 list-unstyled d-flex align-items-center">
                                    <li><a href="#0"><i class="fal fa-file"></i> {{ $post->prettyCategory }}</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> {{ $post->prettyCreatedAt }}</a></li>
                                </ul>
                                <div class="content mt-10">
                                    <h2 class="title border-effect mb-10"><a href="blog-details.html">{{ $post->limitTitle }}</a></h2>
                                    <p>{{ $post->rawContent }}</p>
                                </div>
                                <div class="bottom mt-35 d-flex align-items-center">
                                    <a href="blog-details.html" class="site-btn">read more</a>
                                    <div class="author d-flex align-items-center">
                                        <div class="a-thumb mr-15">
                                            <img src="{{ $post->admin->avatar }}" alt="">
                                        </div>
                                        <h5 class="border-effect"><a href="#0" class="name">{{ $post->admin->name }}</a></h5>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        <div class="cafena-pagination mt-60">
                            {{ $posts->withQueryString()->links('vendor.customer-pagination') }}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog__sidebar mt-none-30">
                            <div class="widget mt-30">
                                <h2 class="title">Search Here</h2>
                                <div class="search-widget">
                                    <input id="i-search" name="q" value="{{ request()->get('q') }}" placeholder="Search post">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </div>
                            <div class="widget mt-30">
                                <h2 class="title">Categories</h2>
                                <ul>
                                    @foreach ($categories as $key => $category)
                                        <li class="cat-item @if (request()->get('category') === (string) $key) bg-info @endif">
                                            <a href="?category={{ $key }}">{{ $category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget mt-30">
                                <h2 class="title">Other posts</h2>
                                <div class="recent-posts">
                                    @foreach ($other_posts as $post)
                                        <div class="item d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{ $post->banner }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="rp-title border-effect"><a href="blog-details.html">{{ $post->limitTitle }}</a></h5>
                                                <a href="#0" class="date"><i class="fal fa-calendar-alt"></i>  {{ $post->prettyCreatedAt }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="widget mt-30">
                                <h2 class="title">Popular Tag</h2>
                                <div class="tagcloud">
                                    @foreach ($tags as $tag)
                                        <a class="@if (request()->get('tag') === $tag->name) bg-info @endif" href="?tag={{ $tag->name }}">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->

    </main>
@endsection

@section('custom_script')
    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
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
