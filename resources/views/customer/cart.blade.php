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
                        <h2 class="page-title">Cafena Cart</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>Cart</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- cart area start -->
        <div class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-wrapper">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">Product Image</th>
                                        <th class="cart-product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">subTotal</th>
                                    </tr>
                                    </thead>
                                    <tbody id="content">
                                    @foreach ($products as $id => $product)
                                        <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" class="img">
                                                <img src="{{ $product['information']->images[0]->path }}" alt="">
                                            </a>
                                            <a href="{{ route('remove_product', ['product_id' => $id]) }}" class="product-remove"><i class="fal fa-times"></i></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{ $product['information']->name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ prettyPrice($product['information']->price) }}</span></td>
                                        <td class="product-quantity">
                                            <a href="{{ route('change_cart', ['product_id' => $id, 'type' => 'decrease']) }}" class="product-remove">
                                                <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg>
                                            </a>
                                            <span class="amount">{{ $product['amount'] }}</span>
                                            <a href="{{ route('change_cart', ['product_id' => $id]) }}" style="text-decoration: none;" class="product-remove">
                                                <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                            </a>

                                        </td>
                                        <td class="product-subtotal"><span class="amount">{{ prettyPrice($product['sum_price']) }}</span></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if (! empty(session()->get('cart')))
                    <div class="row justify-content-end">
                        <div class="col-xl-5 col-lg-7">
                            <div class="cart-total mt-100">
                                <h2 class="title">Cart Total</h2>
                                <div class="ct-sub ct-sub__total">
                                    <span>Total</span>
                                    <span>{{ prettyPrice($total) }}</span>
                                </div>
                                <a href="{{ route('checkout') }}" class="site-btn">Procced to checkout</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- cart area end -->


    </main>


@endsection

@section('custom_script')
    <script src="{{ asset('assets/js/add_to_cart.js') }}"></script>
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
