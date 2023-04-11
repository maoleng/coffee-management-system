
<!doctype html>
<html class="no-js" lang="zxx">

@include('customer-theme.head_tag')


<body>
<!-- preloader  -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                    <span data-text-preloader="C" class="letters-loading">
                        C
                    </span>
                <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                <span data-text-preloader="F" class="letters-loading">
                        F
                    </span>
                <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
            </div>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->

<!-- header start -->
@include('customer-theme.header')
<!-- header end -->
@include('customer-theme.side_bar')
@yield('content')

@include('customer-theme.footer')

@include('customer-theme.script')
</body>

</html>
