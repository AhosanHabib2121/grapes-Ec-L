<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/jesco/jesco/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Sep 2021 07:18:43 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- ajax x-csrf token link start here --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ajax x-csrf token link end here --}}

    <!-- Add site Favicon -->
    <link rel="shortcut icon" type="image/png"  href="{{asset('upload_photos/favicon')}}/{{App\Models\Favicon::first()->favicon_photo}}">


    <!-- vendor css (Icon Font) -->
    <!-- <link rel="stylesheet" href="{{asset('frontend')}}/css/vendor/bootstrap.bundle.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/vendor/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/vendor/font.awesome.css" /> -->

    <!-- plugins css (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/animate.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/venobox.css" /> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.min.css">

    <!-- Main Style -->
    <!-- <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" /> -->

</head>

<body>

    <!-- Top Bar -->

    <div class="header-to-bar">{{App\Models\New_offer::first()->offer_title}}</div>

    <!-- Top Bar -->
    <!-- Header Area Start -->
    <header>
        <div class="header-main sticky-nav ">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{asset('upload_photos/logo-photo')}}/{{App\Models\Project_logo::first()->logo_photo}}" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <div class="col align-self-center d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('shop')}}">Shop</a></li>
                                <li><a href="{{route('about')}}">About us</a></li>
                                <li><a href="{{route('contact')}}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Action Start -->
                    <div class="col col-lg-auto align-self-center pl-0">
                        <div class="header-actions">
                            {{-- <a href="login.html" class="header-action-btn login-btn" data-bs-toggle="modal"
                                data-bs-target="#loginActive">Sign In</a> --}}
                                @guest
                                    <a href="{{route('customer.login')}}" class="header-action-btn login-btn">Login</a>
                                @else
                                    @if (auth()->user()->role == 'Customer')
                                        <a href="{{route('customer.dashboard')}}" class="header-action-btn login-btn">{{auth()->user()->name}} Go to Dashboard</a>
                                    @else
                                        <a href="{{route('home')}}" class="header-action-btn login-btn">{{auth()->user()->name}} Go to Dashboard</a>
                                    @endif
                                @endguest
                            <!-- Single Wedge Start -->
                            <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                                <i class="pe-7s-search"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num" id="header_cart_num">
                                    {{App\Models\Cart::where('user_id',auth()->id())->count()}}
                                </span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
    </header>
    <!-- Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @foreach (App\Models\Cart::all() as $cart_data )
                        <li>
                            <a href="single-product.html" class="image"><img src="{{asset('upload_photos/product-photos')}}/{{$cart_data->relationToproduct->product_thumbnail_photo}}"
                                    alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">{{$cart_data->relationToproduct->product_name}}</a>
                                <span class="quantity-price">{{$cart_data->cart_to_amount}} x <span class="amount">${{$cart_data->product_current_price}}</span></span>
                                <a href="" class="remove">×</a>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="foot">
                <div class="buttons mt-30px">
                    <a href="{{route('cart')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    {{-- <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    {{-- main content start here --}}
    @yield('content')
    {{-- main content end here --}}

     <!-- Footer Area Start -->
     <div class="footer-area {{(Route::currentRouteName()=='index')? 'm-lrb-30px' :''}} ">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                            <div class="single-wedge">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{asset('frontend')}}/images/logo/logo-white.png" alt=""></a>
                                </div>
                                <p class="about-text">{{App\Models\Footer_describe::first()->short_description}}</p>
                                @php
                                   $icon_data_all=App\Models\Footer_social_icon::all();
                                @endphp
                                <ul class="link-follow">
                                    @foreach ($icon_data_all as $icon_data )
                                    <li>
                                        <a class="m-0" title="Twitter" href="{{$icon_data->social_icon_link}}"><i class="fa {{$icon_data->social_icon}}"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-3 col-sm-6 col-lg-2 mb-md-30px mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Quick Links</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="#">Support
                                                </a></li>
                                            <li class="li"><a class="single-link" href="#">Helpline</a></li>
                                            <li class="li"><a class="single-link" href="#">Courses</a></li>
                                            <li class="li"><a class="single-link" href="#">About</a></li>
                                            <li class="li"><a class="single-link" href="#">Event</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-3 col-lg-2 col-sm-6 mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Other Page</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="{{route('index')}}"> Home</a>
                                            </li>
                                            <li class="li"><a class="single-link" href="{{route('shop')}}">Shop</a></li>
                                            <li class="li"><a class="single-link" href="{{route('about')}}">About</a></li>
                                            <li class="li"><a class="single-link" href="{{route('contact')}}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-3 col-lg-2 col-sm-6 mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Company</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="{{route('shop')}}">Shop</a>
                                            </li>
                                            <li class="li"><a class="single-link" href="{{route('contact')}}">Contact us</a>
                                            </li>
                                            <li class="li"><a class="single-link" href="{{route('login')}}">Log in</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-4 col-lg-3 col-sm-6">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Store Information.</h4>
                                @php
                                    $parsonal_data=App\Models\Admin_parsonal_info::first();
                                @endphp
                                <div class="footer-links">
                                    <!-- News letter area -->
                                    <p class="address">{{$parsonal_data->address}}</p>
                                    <p class="phone">Phone/Fax:<a href="tel:0123456789">{{$parsonal_data->phone_number}}</a></p>
                                    <p class="mail">Email:<a href="mailto:demo@example.com">{{$parsonal_data->email}}</a></p>
                                    <!-- News letter area  End -->
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="copy-text"> &copy; {{date('Y')}} <strong>{{env('APP_NAME')}}</strong> Develop<i class="fa fa-heart"
                                    aria-hidden="true"></i> By <a class="company-name" href="#">
                                    <strong>Habib</strong></a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->

    <!-- Search Modal Start -->
    <div class="modal popup-search-style" id="searchActive">
        <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <div class="modal-overlay">
            <div class="modal-dialog p-0" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Search Your Product</h2>
                        <form class="navbar-form position-relative" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search here...">
                            </div>
                            <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- Login Modal Start -->
    <div class="modal popup-login-style" id="loginActive">
        <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <div class="modal-overlay">
            <div class="modal-dialog p-0" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="login-content">
                            <h2>Log in</h2>
                            <h3>Log in your account</h3>
                            <form action="#">
                                <input type="text" placeholder="Username">
                                <input type="password" placeholder="Password">
                                <div class="remember-forget-wrap">
                                    <div class="remember-wrap">
                                        <input type="checkbox">
                                        <p>Remember</p>
                                        <span class="checkmark"></span>
                                    </div>
                                    <div class="forget-wrap">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <button type="button">Log in</button>
                                <div class="member-register">
                                    <p> Not a member? <a href="login.html"> Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->
    <!-- Modal -->
    <div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container zoom-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/zoom-image/1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/zoom-image/2.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/zoom-image/3.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/zoom-image/4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container zoom-thumbs mt-3 mb-3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/small-image/1.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/small-image/2.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/small-image/3.jpg" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="{{asset('frontend')}}/images/product-image/small-image/4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-details-content quickview-content">
                                <h2>Ardene Microfiber Tights</h2>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">$18.90</li>
                                    </ul>
                                </div>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">( 5 Customer Review
                                            )</a></span>
                                </div>
                                <p class="mt-30px mb-0">Lorem ipsum dolor sit amet, consect adipisicing elit, sed do
                                    eiusmod tempor incidi ut labore
                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco
                                    laboris nisi
                                    ut aliquip ex ea commodo </p>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart">
                                        <button class="add-cart" href="#"> Add To
                                            Cart</button>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-details-compare-wishlist pro-details-compare">
                                        <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                                    </div>
                                </div>
                                <div class="pro-details-sku-info pro-details-same-style  d-flex">
                                    <span>SKU: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Ch-256xl</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-categories-info pro-details-same-style d-flex">
                                    <span>Categories: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#">Fashion.</a>
                                        </li>
                                        <li>
                                            <a href="#">eCommerce</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-social-info pro-details-same-style d-flex">
                                    <span>Share: </span>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
    <!-- <script src="{{asset('frontend')}}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend')}}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="{{asset('frontend')}}/js/vendor/modernizr-3.11.2.min.js"></script> -->

    <!--Plugins JS-->
    <!-- <script src="{{asset('frontend')}}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/jquery-ui.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/jquery.nice-select.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/countdown.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/scrollup.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/jquery.zoom.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/venobox.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('frontend')}}/js/vendor/vendor.min.js"></script>
    <script src="{{asset('frontend')}}/js/plugins/plugins.min.js"></script>
    <script src="{{asset('frontend')}}/sweetalert/sweetalert2@11.js"></script>

    <!-- Main Js -->
    <script src="{{asset('frontend')}}/js/main.js"></script>
    {{-- footer script content start here --}}
        @yield('footer_script_content')
    {{-- footer script content end here --}}
</body>


<!-- Mirrored from template.hasthemes.com/jesco/jesco/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Sep 2021 07:19:21 GMT -->
</html>
