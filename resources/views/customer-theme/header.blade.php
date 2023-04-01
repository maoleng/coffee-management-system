<div class="header sticky-header section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Logo Start -->
            <div class="col-lg-2 col">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{ asset('customer-assets/images/logo/logo-dark.webp') }}" width="125" height="42" alt="kofi logo">
                        <img class="light" src="{{ asset('customer-assets/images/logo/logo-light.webp') }}" width="125" height="42" alt="kofi logo">
                    </a>
                </div>
            </div>
            <!-- Logo End -->
            <!-- Menu Start -->
            <div class="col d-none d-lg-block">
                <nav class="main-menu">
                    <ul>
                        <li class="has-sub-menu">
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="shop-left-sidebar.html">Products</a>
                        </li>
                        <li class="has-sub-menu">
                            <a href="blog-left-sidebar.html">Blog</a>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Menu End -->
            <!-- Action Start -->
            <div class="col-auto">
                <div class="header-action">
                    <div class="header-action-item">
                        <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-search"><i class="sli-magnifier"></i></button>
                    </div>
                    <div class="header-action-item">
                        <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart"><i class="sli-basket-loaded"><span class="count">02</span></i> <span class="amount">$229.00</span></button>
                    </div>
                    <div class="header-action-item dropdown">
                        <button class="header-action-toggle" type="button" data-bs-toggle="dropdown"><i class="sli-social-google"></i></button>
                    </div>
                    <div class="header-action-item d-lg-none">
                        <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-header"><i class="sli-menu"></i></button>
                    </div>
                </div>
            </div>
            <!-- Action End -->
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end w-100 bg-dark border-0" id="offcanvas-search">
    <div class="offcanvas-body d-flex align-items-center justify-content-center">
        <button type="button" class="btn-close offcanvas-search-close-btn text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="offcanvas-search-form">
            <form action="#">
                <input type="search" name="q" placeholder="Search our store">
                <button type="submit"><i class="sli-magnifier"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" id="offcanvas-cart">
    <div class="offcanvas-header">
        <h5>Shoping Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <div class="header-cart-body">
            <div class="header-cart-products">
                <div class="header-cart-product">
                    <div class="header-cart-product-thumb">
                        <a href="product-details.html" class="header-cart-product-image"><img src="{{ asset('customer-assets/images/products/cart/product-1.webp') }}" alt="House Coffee Original" width="90" height="103"></a>
                        <button class="header-cart-product-remove"><i class="sli-close"></i></button>
                    </div>
                    <div class="header-cart-product-content">
                        <h5 class="header-cart-product-title"><a href="product-details.html">House Coffee Original</a></h5>
                        <span class="header-cart-product-quantity">1 x $110.00</span>
                    </div>
                </div>
                <div class="header-cart-product">
                    <div class="header-cart-product-thumb">
                        <a href="product-details.html" class="header-cart-product-image"><img src="{{ asset('customer-assets/images/products/cart/product-2.webp') }}" alt="Medium Roast Ground Coffee" width="90" height="103"></a>
                        <button class="header-cart-product-remove"><i class="sli-close"></i></button>
                    </div>
                    <div class="header-cart-product-content">
                        <h5 class="header-cart-product-title"><a href="product-details.html">Medium Roast Ground Coffee</a></h5>
                        <span class="header-cart-product-quantity">1 x $19.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-cart-footer">
            <h4 class="header-cart-total">Total: <span>$129.00</span></h4>
            <div class="header-cart-buttons">
                <a href="checkout.html" class="btn btn-outline-dark btn-primary-hover">CHECKOUT</a>
                <a href="cart.html" class="btn btn-outline-dark btn-primary-hover">VIEW CART</a>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" id="offcanvas-header">
    <div class="offcanvas-header">
        <h5>Mobile Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="mobile-menu">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="shop-left-sidebar.html">Products</a>
                </li>
                <li>
                    <a href="blog-left-sidebar.html">Blog</a>
                </li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>
