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
                        <h2 class="page-title">Get in touch</h2>
                        <div class="cafena-breadcrumb breadcrumbs">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                <li class="cafenabcrumb-item duxinbcrumb-begin">
                                    <a href="{{ route('index') }}"><span>Home</span></a>
                                </li>
                                <li class="cafenabcrumb-item duxinbcrumb-end">
                                    <span>contact</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact__area position-relative pt-120 pb-120">
            <span class="shape shape__1 position-absolute"><img src="{{ asset('customer-assets/images/shape/hero-shape-2-1.png') }}" alt=""></span>
            <span class="shape shape__2 position-absolute"><img src="{{ asset('customer-assets/images/shape/hero-shape-2-2.png') }}" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact__wrapper">
                            <div class="row mt-none-30">
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="contact-info d-flex align-items-center justify-content-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('customer-assets/images/icons/ci-1.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="title">Contact us</h3>
                                            <a href="mailto:Israfilsupol836@gmail.com">Israfilsupol836@gmail.com</a>
                                            <a href="tel:088-01869018907">088 - 01869018907</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="contact-info d-flex align-items-center justify-content-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('customer-assets/images/icons/ci-2.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="title">Our Location</h3>
                                            <p>Hera Road 2344-78 Australia
                                                897- South Side Melbon</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <div class="contact-info d-flex align-items-center justify-content-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('customer-assets/images/icons/ci-3.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="title">Opening HOurs</h3>
                                            <p>Mon - Sat (8:00 - 6:00)</p>
                                            <p>Sunday - Closed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__form mt-20">
                                        <div>
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-6 mt-30">
                                                    <div class="form-group">
                                                        <input type="text" id="name" placeholder="Your name :">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-30">
                                                    <div class="form-group">
                                                        <input type="email" id="email" placeholder="Your Mail :">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 mt-30">
                                                    <div class="form-group">
                                                        <textarea id="content" placeholder="Your Massage :"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 mt-20 text-center">
                                                    <button id="btn-send" type="button" class="site-btn">send massage</button>
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
    </main>
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#btn-send').on('click', function() {
                $.ajax({
                    url: '{{ route('send_support_request') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: $('#name').val(),
                        email: $('#email').val(),
                        content: $('#content').val(),
                    }
                }).done(function(e) {
                    let timerInterval
                    Swal.fire({
                        title: 'Send request successfully',
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
