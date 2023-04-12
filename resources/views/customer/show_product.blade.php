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
                        <h2 class="page-title">Product Details</h2>
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
        @foreach ($relate_products as $relate_product)
            <div id="{{ $relate_product->id }}" class="product-popup product-popup-1">
                <div class="view-background">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <div class="quickview d-flex align-items-center justify-content-center">
                                <div class="quickview__thumb">
                                    <img src="{{ $relate_product->images[0]->path ?? null }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="viewcontent">
                                <div class="viewcontent__header">
                                    <h2>{{ $relate_product->name }}</h2>
                                    <a class="view_close product-p-close" href="javascript:void(0)"><i class="fal fa-times"></i></a>
                                </div>
                                <div class="viewcontent__price">
                                    <h4>{{ prettyPrice($relate_product->price) }}</h4>
                                </div>
                                <div class="viewcontent__stock">
                                    @php ($status = $relate_product->status)
                                    <h4>Available :<span> {{ $status['raw'] }}</span></h4>
                                </div>
                                <div class="viewcontent__details">
                                    <p>{{ $relate_product->description }}</p>
                                </div>
                                @if ($status['status'])
                                    <div class="viewcontent__action">
                                        <button data-product_id="{{ $relate_product->id }}" class="btn-add_to_cart site-btn cursor-pointer">add to cart</button>
                                    </div>
                                @endif
                                <div class="viewcontent__footer">
                                    <ul class="list-unstyled">
                                        <li>Category:</li>
                                        <li>Expire month:</li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>{{ $relate_product->category->name }}</li>
                                        <li>{{ $relate_product->expire_month }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        <!-- product popup end -->

        <!-- product details area start -->
        <div class="product-details__area pt-120 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-details__wrapper">
                            <div class="pd-img">
                                <div class="tab-content" id="pdContent">
                                    @foreach ($product->images as $i => $image)
                                        <div class="tab-pane fade @if ($i === 0) show active @endif" id="pd-{{ $i }}" role="tabpanel" aria-labelledby="pd-{{ $i }}-tab">
                                            <div class="big-img">
                                                <img src="{{ $image->path }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-tab">
                                <nav>
                                    <div class="nav" id="shop-filter-tab" role="tablist">
                                        @foreach ($product->images as $i => $image)
                                            <a class="nav-link @if ($i === 0) active @endif" id="pd-{{ $i }}-tab" data-bs-toggle="tab" href="#pd-{{ $i }}" role="tab" aria-controls="pd-{{ $i }}" aria-selected="true">
                                                <img src="{{ $image->path }}" alt="">
                                            </a>
                                        @endforeach
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-details__content">
                            <div class="tr-wrapper d-flex align-items-center justify-content-between">
                                <h2 class="title">{{ $product->name }}</h2>
                            </div>
                            <p>{{ $product->description }}</p>
                            <span class="in-stock">
                                @php ($status = $product->status)
                                <i class="fal fa-check"></i> {{ $status['raw'] }}
                            </span>
                            <h3 class="price">{{ prettyPrice($product->price) }}</h3>
                            @if ($status['status'])
                                <div class="product-quantity d-flex align-items-center">
                                    <span>Quantity</span>
                                    <button data-product_id="{{ $product->id }}" class="btn-add_to_cart site-btn cursor-pointer">add to cart</button>
                                </div>
                            @endif
                            <div class="pd-social-wrapper">
                                <span class="share"><i class="fas fa-share"></i> Share</span>
                                <div class="social-links d-flex align-items-center">
                                    <a href="#0" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="#0" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#0" target="_blank"><i class="fab fa-youtube"></i></a>
                                    <a href="#0" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#0" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product details area end -->

        <!-- releted products area start -->
        <div class="releted-product__area pt-100 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2 class="rp-title mb-30">
                            Related Product
                        </h2>
                    </div>
                </div>
                <div class="row mt-none-30">
                    @foreach ($relate_products as $product)
                        <div class="col-xl-3 col-lg-6 col-md-6 mt-30">
                            <div class="pp__item pp__item--2 text-center pt-20 pb-20">
                                <div class="pp__action pp__action--2 d-flex align-items-center justify-content-center">
                                    <div class="cart d-flex align-items-center justify-content-center">
                                        <a class="btn-add_to_cart" data-product_id="{{ $product->id }}"><i class="fal fa-shopping-basket"></i></a>
                                    </div>
                                    <div data-product_id="{{ $product->id }}" class="view d-flex align-items-center justify-content-center">
                                        <button href="#"><i class="fal fa-eye"></i></button>
                                    </div>
                                </div>
                                <div class="pp__thumb pp__thumb--2 mt-35">
                                    <img class="default" src="{{ $product->images[0]->path ?? null }}" alt="">
                                    <img class="on-hover" src="{{ $product->images[1]->path ?? null }}" alt="">
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
        </div>
        <!-- releted products area end -->

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
