@extends('layouts.frontend_master')

@section('content')
    <!-- About Intro Area start-->
    @forelse ($about_intro_area_data as $about_intro_area_data)
        <div class="about-intro-area">
            <div class="container position-relative h-100 d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-intro-content">
                            <h2 class="title">{{$about_intro_area_data->title}}</h2>
                            <p>{{$about_intro_area_data->short_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="intro-left">
                    <img src="{{asset('upload_photos/intro-area-photo-one')}}/{{$about_intro_area_data->intro_small_photo}}" alt="not found" class="intro-left-image">
                </div>
                <div class="intro-right">
                    <img src="{{asset('upload_photos/intro-area-photo-two')}}/{{$about_intro_area_data->intro_large_photo}}" alt="not found" class="intro-right-image">
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
    <!-- About Intro Area End-->

    <!-- Service Area Start -->
    @forelse ($about_service_area_data as $about_service_area )
        <div class="service-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="service-left align-self-center align-items-center">
                            <img src="{{asset('upload_photos/about-service-area-photo')}}/{{$about_service_area->service_photo}}" alt="not found" class="service-left-image">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="service-right-content align-self-center align-items-center">
                            <span class="sami-title">{{$about_service_area->title}}</span>
                            <h2 class="title">{{$about_service_area->subtitle}}</h2>
                            <p>{{$about_service_area->short_description}}</p>
                            <a href="{{route('shop')}}" class="btn btn-primary service-btn"> Shop Now <i
                                    class="fa fa-shopping-basket ml-10px" aria-hidden="true"></i></a>
                        </div>
                    </div>
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

    <!-- Service Area End -->

    <!-- Team Area Start -->
    <div class="team-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px">
                        <h2 class="title line-height-1">#ourteam</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($about_team_area_data as $about_team_area_data )
                    <div class="col-md-4 mb-lm-30px">
                        <!-- Single Team -->
                        <div class="team-wrapper">
                            <div class="team-image overflow-hidden">
                                <img src="{{asset('upload_photos/about-team-area-photo')}}/{{$about_team_area_data->team_photo}}" alt="not found">
                            </div>
                            <div class="team-content">
                                <h6 class="title">{{$about_team_area_data->name}}</h6>
                                <span class="sub-title">{{$about_team_area_data->title}}</span>
                            </div>
                            <ul class="team-social d-flex">
                                @foreach ($about_team_social_icon_data as $about_team_social_icon )
                                    <li><a href="{{$about_team_social_icon->social_icon_link}}"><i class="fa {{$about_team_social_icon->social_icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Single Team -->
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

    <!-- Team Area End -->

    <!-- Feature Area Srart -->
    <div class="feature-area pb-100px pt-100px bg-gray">
        <div class="container">
            <div class="row">
                @forelse ($about_feature_area_data as $about_feature_area )
                    <div class="col-lg-4 col-md-6">
                        <!-- single item -->
                        <div class="single-feature border-0">
                            <div class="feature-icon">
                                <img src="{{asset('upload_photos/about-feature-photos')}}/{{$about_feature_area->feature_photo}}" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">{{$about_feature_area->title}}</h4>
                                <span class="sub-title">{{$about_feature_area->sub_title}}</span>
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
            </div>
        </div>
    </div>
    <!-- Feature Area End -->

    <!-- Testimonial Area Start -->
    <div class="testimonial-area pb-40px pt-100px ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-0">
                        <h2 class="title line-height-1">#testimonials</h2>
                    </div>
                </div>
            </div>
            <!-- Slider Start -->
            <div class="testimonial-wrapper swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slider Single Item -->
                    @foreach ($about_testimonial_area_data as $about_testimonial_area )
                        <div class="swiper-slide">
                            <div class="testi-inner">
                                <div class="reating-wrap">
                                    @foreach ($testimonial_reating_data as $testimonial_reating )
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @endforeach
                                </div>
                                <div class="testi-content">
                                    <p>{{$about_testimonial_area->short_description}}</p>
                                </div>
                                <div class="testi-author">
                                    <div class="author-img">
                                        <img src="{{asset('upload_photos/about-testimonial-photos')}}/{{$about_testimonial_area->testimonial_photo}}" alt="">
                                    </div>
                                    <div class="author-name">
                                        <h4 class="name">{{$about_testimonial_area->name}}</h4>
                                        <span class="title">{{$about_testimonial_area->title}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Slider Start -->
        </div>
    </div>
    <!-- Testimonial Area End -->

    <!-- Brand area start -->
    <div class="brand-area pb-100px">
        <div class="container">
            <div class="brand-slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($about_brand_area_data as $about_brand_area)
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="{{$about_brand_area->brand_link}}"><img class=" img-fluid" src="{{asset('upload_photos/about-brand-photo')}}/{{$about_brand_area->brand_photo}}" alt="not found" /></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->
@endsection
