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
                        <h2 class="page-title">Cafena Product</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>Product</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- product popup start -->
        @foreach ($products as $product)
            <div id="{{ $product->id }}" class="product-popup product-popup-1">
                <div class="view-background">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <div class="quickview d-flex align-items-center justify-content-center">
                                <div class="quickview__thumb">
                                    <img src="{{ $product->images[0]->path ?? null }}" alt="">
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
                                    @php ($status = $product->status)
                                    <h4>Available :<span> {{ $status['raw'] }}</span></h4>
                                </div>
                                <div class="viewcontent__details">
                                    <p>{{ $product->description }}</p>
                                </div>
                                @if ($status['status'])
                                <div class="viewcontent__action">
                                    <button data-product_id="{{ $product->id }}" class="btn-add_to_cart site-btn cursor-pointer">add to cart</button>
                                </div>
                                @endif
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
        <!-- product popup end -->

        <!-- blog area start -->
        <div class="blog-area pt-120 pb-105">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-filter-wrapper d-flex justify-content-between align-items-center mb-30">
                            <div class="sf-left">
                                <div class="show-text">
                                    <span></span>
                                </div>
                            </div>
                            <div class="sf-right d-flex justify-content-end align-items-center">
                                <nav>
                                    <div class="nav" id="shop-filter-tab" role="tablist">
                                        <a class="nav-link active" id="shop-tab-1-tab" data-bs-toggle="tab"
                                           href="#shop-tab-1" role="tab" aria-controls="shop-tab-1"
                                           aria-selected="true"><i class="fas fa-th"></i></a>
                                        <a class="nav-link" id="shop-tab-2-tab" data-bs-toggle="tab" href="#shop-tab-2"
                                           role="tab" aria-controls="shop-tab-2" aria-selected="false"><i class="fas fa-list-ul"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="tab-content" id="shop-tabContent">
                            <div class="tab-pane fade show mt-none-30 active" id="shop-tab-1" role="tabpanel" aria-labelledby="shop-tab-1-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-xl-4 col-lg-6 col-md-6 mt-30">
                                        <div class="pp__item pp__item--2 active text-center pt-20 pb-20">
                                            <div class="pp__action pp__action--2 d-flex align-items-center justify-content-center">
                                                <div class="cart d-flex align-items-center justify-content-center">
                                                    <a class="btn-add_to_cart" data-product_id="{{ $product->id }}"><i class="fal fa-shopping-basket"></i></a>
                                                </div>
                                                <div data-product_id="{{ $product->id }}" class="view d-flex align-items-center justify-content-center">
                                                    <button href="#"><i class="fal fa-eye"></i></button>
                                                </div>
                                            </div>
                                            <div class="pp__thumb pp__thumb--2 mt-35">
                                                <img class="default" style="height: 133px" src="{{ $product->images[0]->path ?? null }}" alt="">
                                                <img class="on-hover" style="height: 133px" src="{{ $product->images[1]->path ?? null }}" alt="">
                                            </div>
                                            <div class="pp__content pp__content--2 mt-25">
                                                <div class="pp__c-top d-flex align-items-center justify-content-center">
                                                    <div class="pp__cat pp__cat--2">
                                                        <a href="">{{ $product->category->name }}</a>
                                                    </div>
                                                </div>
                                                <h4 class="pp__title pp__title--2">
                                                    <a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                </h4>
                                                <div class="pp__price pp__price--2 d-flex align-items-center justify-content-center">
                                                    <h6 class="label">Price - </h6>
                                                    <span class="price">{{ prettyPrice($product->price) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade mt-none-30" id="shop-tab-2" role="tabpanel" aria-labelledby="shop-tab-2-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-xl-12 mt-30">
                                        <div class="pp__item pp__item--2 pp__item--list active text-center pt-30 pb-25">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="pp__thumb pp__thumb--2 pp__thumb--list m-0">
                                                        <img class="default" src="{{ $product->images[0]->path ?? null }}" alt="">
                                                        <img class="on-hover" src="{{ $product->images[1]->path ?? null }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="pp__content pp__content--2 pp__content--list m-0">
                                                        <div class="pp__c-top d-flex align-items-center">
                                                            <div class="pp__cat pp__cat--2">
                                                                <a href="#0">{{ $product->category->name }}</a>
                                                            </div>
                                                        </div>
                                                        <h4 class="pp__title pp__title--2 pp__title--list">
                                                            <a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                        </h4>
                                                        <div class="pp__price pp__price--2 pp__price--list d-flex align-items-center">
                                                            <h6 class="label">Price - </h6>
                                                            <span class="price">{{ prettyPrice($product->price) }}</span>
                                                        </div>
                                                        <div class="pp__action pp__action--2 pp__action--list d-flex align-items-center mt-15">
                                                            <div class="cart d-flex align-items-center justify-content-center">
                                                                <a href="#0"><i class="fal fa-shopping-basket"></i></a>
                                                            </div>
                                                            <div data-product_id="{{ $product->id }}" class="view d-flex align-items-center justify-content-center">
                                                                <button href="#0"><i class="fal fa-eye"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="cafena-pagination mt-60">
                            {{ $products->withQueryString()->links('vendor.customer-pagination') }}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="blog__sidebar blog__sidebar--shop mt-none-30">
                            <div class="widget mt-30">
                                <h2 class="title">Search Here</h2>
                                <div class="search-widget">
                                    <input id="i-search" name="q" value="{{ request()->get('q') }}" placeholder="Search product">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </div>
                            <div class="widget mt-30">
                                <h2 class="title">Categories</h2>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li class="cat-item @if (request()->get('category') === $category->name) bg-info @endif ">
                                            <a href="?category={{ $category->name }}">{{ $category->name }}</a>
                                            <span>{{ $category->products_count }}</span>
                                        </li>
                                    @endforeach
                                </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.view').on('click',function() {
                const product_id = $(this).data('product_id')
                $('.overlay').addClass('show-popup')
                $(`#${product_id}`).addClass('show-popup')
            })
            $('.btn-add_to_cart').on('click', function() {
                const product_id = $(this).data('product_id')

                $.ajax({
                    url: '{{ route('add_to_cart') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: product_id,
                    }
                }).done(function(e) {
                    $('.product-p-close').click()
                    let timerInterval
                    Swal.fire({
                        title: 'Add to cart successfully',
                        html: 'Close in <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    })
                })
            })
        })
    </script>
@endsection
