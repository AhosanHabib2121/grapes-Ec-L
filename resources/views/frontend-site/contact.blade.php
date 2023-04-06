@extends('layouts.frontend_master')

@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Contact Us</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Contact Area Start -->
    <div class="contact-area pt-100px pb-100px">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-info">
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="{{asset('frontend')}}/images/icons/4.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title" >Phone:</h5>
                                    <p><a href="tel:0123456789">{{$admin_parsonal_info_data->phone_number}}</a></p>
                                </div>
                            </div>
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="{{asset('frontend')}}/images/icons/5.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title" >Email:</h5>
                                    <p><a href="mailto:demo@example.com">{{$admin_parsonal_info_data->email}}</a></p>
                                </div>
                            </div>
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="{{asset('frontend')}}/images/icons/6.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title" >Address:</h5>
                                    <p>{{$admin_parsonal_info_data->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <div class="contact-title mb-30">
                                <h2 class="title" data-aos="fade-up" data-aos-delay="200">Leave a Message</h2>
                                <p>{{$contact_head_data->short_description}}</p>
                            </div>
                            <form class="contact-form-style"  action="{{route('contact_data.add')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                        <input name="name" placeholder="Name*" type="text" />
                                    </div>
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                        <input name="email" placeholder="Email*" type="email" />
                                    </div>
                                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                                        <textarea name="message" placeholder="Your Message*"></textarea>
                                        <button class="btn btn-primary mt-4" data-aos="fade-up" data-aos-delay="200" type="submit">Post Comment <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            {{-- <p class="form-messege"></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    <!-- map Area Start -->

    <div class="contact-map">
        <div id="mapid">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe id="gmap_canvas" src="{{$contact_map_link_data->embed_map_link}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- map Area End -->
@endsection
