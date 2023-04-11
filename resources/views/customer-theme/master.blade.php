
<!doctype html>
<html class="no-js" lang="zxx">

@include('customer-theme.head_tag')


<body>
<!-- preloader  -->
@if (\Illuminate\Support\Facades\Route::currentRouteName() !== 'cart')
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                    <span data-text-preloader="C" class="letters-loading">
                        C
                    </span>
                <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                <span data-text-preloader="F" class="letters-loading">
                        F
                    </span>
                <span data-text-preloader="F" class="letters-loading">
                        F
                    </span>
                <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                <span data-text-preloader="E" class="letters-loading">
                        E
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
@endif
<!-- preloader end -->

@include('customer-theme.header')
@yield('content')

@include('customer-theme.footer')

@include('customer-theme.script')
@yield('custom_script')
</body>

</html>
