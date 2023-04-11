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
                        <h2 class="page-title">Post Details</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>Details</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- blog area start -->
        <div class="blog-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="blog__wrapper blog__wrapper--single">
                            <article class="blog__post blog__post--single format format-image">
                                <div class="thumb">
                                    <img src="{{ $post->banner }}" alt="">
                                </div>
                                <ul class="meta mt-20 list-unstyled d-flex align-items-center">
                                    <li><a href="#0"><i class="fal fa-file"></i> {{ $post->prettyCategory }}</a></li>
                                    <li><a href="#0"><i class="fal fa-calendar-alt"></i> {{ $post->prettyCreatedAt }}</a></li>
                                </ul>
                                <div class="content mt-10">
                                    <h1 class="title mb-10">{{ $post->title }}</h1>
                                    {!! $post->content !!}
                                </div>
                                <div class="tag-social-wrapper mt-30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Related Tags</h4>
                                            <div class="tagcloud">
                                                @foreach ($post->postTags as $tag)
                                                    <a href="">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6 social-share-wrapper text-left text-md-end">
                                            <h4>Social Share</h4>
                                            <div class="social-share">
                                                <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#0"><i class="fab fa-twitter"></i></a>
                                                <a href="#0"><i class="fab fa-google-plus-g"></i></a>
                                                <a href="#0"><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="navigation-border pt-45 mt-45"></div>
                                    </div>
                                </div>
                                <div class="author-box mt-50 mb-40 d-flex align-items-center justify-content-center">
                                    <div class="ath-thumb mr-40">
                                        <img src="{{ $post->admin->avatar }}" alt="">
                                    </div>
                                    <div class="ath-content">
                                        <span>Written by</span>
                                        <h3 class="name">{{ $post->admin->name }}</h3>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog__sidebar mt-none-30">
                            <div class="widget mt-30">
                                <h2 class="title">Other posts</h2>
                                <div class="recent-posts">
                                    @foreach ($other_posts as $post)
                                        <div class="item d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="{{ $post->banner }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="rp-title border-effect"><a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->limitTitle }}</a></h5>
                                                <a href="#0" class="date"><i class="fal fa-calendar-alt"></i>  {{ $post->prettyCreatedAt }}</a>
                                            </div>
                                        </div>
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

        })
    </script>
@endsection
