@extends('layouts.frontend_master')

@section('content')
    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                @forelse ($banner_info as $banner )
                    <div class="hero-slide-item-2 slider-height swiper-slide d-flex {{($loop->odd == 1)? 'bg-color1' : 'bg-color2'}} ">
                        <div class="container align-self-center">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                    <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                        <span class="category">{{$banner->offer_message}}</span>
                                        <h2 class="title-1">{{$banner->banner_title}}</h2>
                                        <a href="{{route('shop')}}" class="btn btn-lg btn-primary btn-hover-dark"> Shop
                                            Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-6 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                    <div class="show-case">
                                        <div class="hero-slide-image">
                                            <img src="{{asset('upload_photos/banner-photos')}}/{{$banner->banner_photo}}" alt="not found" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-10 m-auto">
                        <div class="alert alert-danger">
                            <P>No data to show</P>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Feature Area Srart -->
    <div class="feature-area  mt-n-65px">
        <div class="container">
            <div class="row">
                @forelse ($feature_info as $feature )
                    <div class="col-lg-4 col-md-6">
                        <!-- single item -->
                        <div class="single-feature">
                            <div class="feature-icon">
                                <img src="{{$feature->feature_photo}}" alt="Not found">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">{{$feature->feature_title}}</h4>
                                <span class="sub-title">{{$feature->sub_title}}</span>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <!-- Feature Area End -->

    <!-- Product Area Start -->
    <div class="product-area pt-100px pb-100px">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12">
                    <div class="section-title text-center mb-0">
                        <h2 class="title">#products</h2>
                        <!-- Tab Start -->
                        <div class="nav-center">
                            <ul class="product-tab-nav nav align-items-center justify-content-center">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                        href="#tab-product--all">All</a></li>
                                @foreach ($categories_info as $category )
                                <li class="nav-item mb-2"><a class="nav-link" data-bs-toggle="tab" href="#tab-product--{{$category->id}}">{{$category->category_name}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Tab End -->
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Section Title & Tab End -->

            <div class="row">
                <div class="col">
                    <div class="tab-content mb-30px0px">
                        <!-- all tab start -->
                        <div class="tab-pane fade show active" id="tab-product--all">
                            <div class="row">
                                @forelse ($product_info as $product )
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                        data-aos-delay="400">
                                        <!-- Single Prodect -->
                                        @include('parts.product')
                                        <!-- Single Prodect -->
                                    </div>
                                @empty
                                    <div class="col-md-10 m-auto">
                                        <div class="alert alert-danger">
                                            <p>No product no show</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <!-- all tab end -->
                        <!-- categoriwes tab start -->
                        @foreach ($categories_info as $category )
                            <div class="tab-pane fade " id="tab-product--{{$category->id}}">
                                <div class="row">
                                    @forelse (App\Models\Product::where('category_id',$category->id)->get() as $product )
                                        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <!-- Single Prodect -->
                                            @include('parts.product')
                                        </div>
                                    @empty
                                        <div class="col-md-12 text-center">
                                            <div class="alert alert-danger">
                                                nothing to show
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        @endforeach
                        <!-- categoriwes tab end -->
                    </div>
                    <a href="{{route('shop')}}" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                            class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    <!-- Banner Area Start -->
    <div class="banner-area pt-100px pb-100px plr-15px">
        <div class="row m-0">
            @forelse ($categories_info as $category )
                <div class="col-12 col-lg-4 mb-3 center-col mb-md-30px mb-lm-30px">
                    <div class="single-banner-2">
                        <img src="{{asset('upload_photos/category-photos')}}/{{$category->category_photo}}" alt="">
                        <div class="item-disc">
                            <h4 class="title bg-white p-3" style="opacity: 0.5">Best Collection <br>
                                {{$category->category_name}}</h4>
                            <a href="{{route('shop')}}" class="shop-link btn btn-primary">Shop Now <i class="fa fa-shopping-basket ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No category to show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Deal Area Start -->
    <div class="deal-area deal-bg deal-bg-2 mt-50px" data-bg-image="{{asset('upload_photos/deal-area-one-photos')}}/{{$deal_background_photo->background_photo}}">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    @forelse ($home_deal_data_all as $home_deal_data )
                        <div class="deal-inner position-relative pt-100px pb-100px">
                            <div class="deal-wrapper">
                                <span class="category">{{$home_deal_data->category_name}}</span>
                                <h3 class="title">{{$home_deal_data->title}}</h3>
                                <div class="deal-timing">
                                    <div data-countdown="2021/05/15">
                                        <span class="cdown day"><span class="cdown-1">0</span><p>Days</p></span>
                                        <span class="cdown hour"><span class="cdown-1">0</span><p>Hours</p></span>
                                        <span class="cdown minutes"><span class="cdown-1">00</span> <p>Mins</p></span>
                                        <span class="cdown second"><span class="cdown-1"> 00</span> <p>Sec</p></span></div>
                                </div>
                                <a href="{{route('shop')}}" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Shop
                                    Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                            </div>
                            <div class="deal-image">
                                <img class="img-fluid" src="{{$home_deal_data->deal_photo}}" alt="not found">
                            </div>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data to show</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Area End -->
    <!--  Blog area Start -->
    <div class="main-blog-area pb-100px pt-100px">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-30px0px">
                        <h2 class="title">{{$home_blog_head_data->title}}</h2>
                        <p class="sub-title">{{$home_blog_head_data->subtitle}}</p>
                    </div>
                </div>
            </div>
            <!-- section title start -->

            <div class="row">
                @forelse ($home_blog_area_data as $home_blog_area)
                    <div class="col-lg-4 mb-md-30px mb-lm-30px">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="{{route('blog.details',$home_blog_area->id)}}"><img src="{{asset('upload_photos/blog-front-photo')}}/{{$home_blog_area->blog_front_photo}}"
                                    class="img-responsive w-100" alt="not found"></a>
                            </div>
                            <div class="blog-text">
                                <div class="blog-athor-date">
                                    <a class="blog-date height-shape" href="{{route('blog.details',$home_blog_area->id)}}"><i class="fa fa-calendar"
                                            aria-hidden="true"></i> {{date('d M, Y')}}</a>
                                    <a class="blog-mosion" href="{{route('blog.details',$home_blog_area->id)}}"><i class="fa fa-commenting" aria-hidden="true"></i>
                                        {{$home_blog_comment_all}} K</a>
                                </div>
                                <h5 class="blog-heading"><a class="blog-heading-link"
                                        href="{{route('blog.details',$home_blog_area->id)}}">{{$home_blog_area->headline_one}}</a></h5>

                                <a href="{{route('blog.details',$home_blog_area->id)}}" class="btn btn-primary blog-btn"> Read More<i
                                        class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-10 m-auto">
                        <div class="alert alert-danger">
                            <p>No data to show</p>
                        </div>
                    </div>
                @endforelse


                <!-- End single blog -->
                {{-- <div class="col-lg-4 mb-md-30px mb-lm-30px">
                    <div class="single-blog ">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('frontend')}}/images/blog-image/2.jpg"
                                    class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                        aria-hidden="true"></i> 24 Aug, 2021</a>
                                <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                    K</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link"
                                    href="blog-single-left-sidebar.html">It is a long established factoi
                                    ader will be distracted</a></h5>

                            <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                    class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div> --}}
                <!-- End single blog -->
                {{-- <div class="col-lg-4">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('frontend')}}/images/blog-image/3.jpg"
                                    class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                        aria-hidden="true"></i> 24 Aug, 2021</a>
                                <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                    K</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link"
                                    href="blog-single-left-sidebar.html">Contrary to popular belieflo
                                    lorem Ipsum is not</a></h5>


                            <a href="blog-single-left-sidebar.html" class="btn btn-primary blog-btn"> Read More<i
                                    class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div> --}}
                <!-- End single blog -->
            </div>
        </div>
    </div>
    <!--  Blog area End -->

@endsection
