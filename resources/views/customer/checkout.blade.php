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
                        <h2 class="page-title">Cafena Checkout</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>Faq</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- cart area start -->
        <div class="checkout-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-wrapper checkout-wrapper">
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="checkout-top">
                                        <h4 class="title">Payment flow</h4>
                                        <nav>
                                            <div class="nav" id="shop-filter-tab" role="tablist">
                                                <a class="nav-link active" id="pd-1-tab" data-bs-toggle="tab" href="#pd-1" role="tab" aria-controls="pd-1" aria-selected="true">
                                                    Promotion
                                                </a>
                                                <a class="nav-link" id="pd-2-tab" data-bs-toggle="tab" href="#pd-2" role="tab" aria-controls="pd-2" aria-selected="true">
                                                    Information
                                                </a>
                                                <a class="nav-link" id="pd-3-tab" data-bs-toggle="tab" href="#pd-3" role="tab" aria-controls="pd-3" aria-selected="true">
                                                    Payment method
                                                </a>
                                            </div>
                                        </nav>

                                        <div class="tab-content" id="pdContent">
                                            <div class="tab-pane fade show active" id="pd-1" role="tabpanel" aria-labelledby="pd-1-tab">
                                                <div class="cart-form">
                                                    <form action="{{ route('add_promotion') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="cname">Promotion code (optional)</label>
                                                                    <input type="text" value="{{ session()->get('promotion')?->code }}" name="code" placeholder="...">
                                                                </div>
                                                            </div>
                                                            @if (session()->get('error') !== null)
                                                                {{ session()->get('error') }}
                                                            @endif
                                                            <button class="site-btn site-btn site-btn__bghide" type="submit">Apply promotion</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pd-2" role="tabpanel" aria-labelledby="pd-2-tab">
                                                <div class="cart-form">
                                                    <form action="{{ route('add_information') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="cname2">Name</label>
                                                                    <input type="text" value="{{ $name ?? null }}" name="name" id="cname2" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="cname2">Address</label>
                                                                    <input type="text" value="{{ $address ?? null }}" name="address" id="cname2" placeholder="Address">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="rname2">Email</label>
                                                                    <input type="text" value="{{ $email ?? null }}" name="email" id="rname2" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="hname2">Phone</label>
                                                                    <input type="text" value="{{ $phone ?? null }}" name="phone" id="hname2" placeholder="Phone">
                                                                </div>
                                                            </div>
                                                            @if (session()->get('error') !== null)
                                                                {{ session()->get('error') }}
                                                            @endif
                                                            <button class="site-btn site-btn site-btn__bghide" type="submit">Update information</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pd-3" role="tabpanel" aria-labelledby="pd-3-tab">
                                                <div class="cart-form">
                                                    <div class="row">
                                                        @if (session()->get('information') !== null)
                                                            <button id="btn-online_checkout" class="mb-3 site-btn">Online Banking</button>
                                                            <br>
                                                            <button id="btn-direct_checkout" class="site-btn">Direct payment</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="cart-total mt-45 text-end">
                                                <h2 class="title text-start">Cart Total</h2>
                                                <div class="ct-sub">
                                                    <span>Product price</span>
                                                    <span>{{ prettyPrice($price_products) }}</span>
                                                </div>
                                                <div class="ct-sub">
                                                    <span>Ship fee</span>
                                                    <span>+ {{ prettyPrice($ship_fee) }}</span>
                                                </div>
                                                <div class="ct-sub">
                                                    <span>Promotion</span>
                                                    <span>- {{ prettyPrice($promotion_reduce) }}</span>
                                                </div>
                                                <div class="ct-sub ct-sub__total">
                                                    <span>Total</span>
                                                    <span>{{ prettyPrice($total) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart area end -->


    </main>


@endsection

@section('custom_script')
    <script src="{{ asset('assets/js/add_to_cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#btn-online_checkout').on('click', function() {
                $.ajax({
                    url: '{{ route('pay') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    }
                }).done(function(data) {
                    localStorage.setItem('order_id', data.order_id)
                    window.location.href = data.url;
                })

            })
            $('#btn-direct_checkout').on('click', function() {
                $.ajax({
                    url: '{{ route('direct_pay') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    }
                }).done(function() {
                    localStorage.setItem('order_id', '1')
                    window.location.href = '{{ route('index') }}';
                })
            })

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
