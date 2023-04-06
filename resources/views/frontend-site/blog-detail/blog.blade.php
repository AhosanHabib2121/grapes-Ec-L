@extends('layouts.frontend_master')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Blog Details</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Blog Area Start -->
    <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
        <div class="container">
            <div class="row">
                @forelse ($home_blog_area_data as $home_blog_area )
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="blog-posts">
                            <div class="single-blog-post blog-grid-post">
                                <div class="blog-image single-blog" data-aos="fade-up" data-aos-delay="200">
                                    <img class="img-fluid h-auto" src="{{asset('upload_photos/blog-display-photo')}}/{{$home_blog_area->blog_display_photo}}" alt="blog" />
                                </div>
                                <div class="blog-post-content-inner mt-30px" data-aos="fade-up" data-aos-delay="400">
                                    <div class="blog-athor-date">
                                        <a class="blog-date height-shape" href="#"><i class="fa fa-calendar"
                                                aria-hidden="true"></i> {{date('d M, Y')}}</a>
                                        <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i>
                                            {{$home_blog_comment_all->count()}} K</a>
                                    </div>
                                    <h4 class="blog-title">{{$home_blog_area->headline_one}}</h4>
                                    <p data-aos="fade-up">
                                        {{$home_blog_area->short_description}}
                                    </p>
                                </div>
                                <div class="single-post-content">
                                    @forelse ($home_blog_comment_data as $home_blog_comment)
                                        <p class="quate-speech" data-aos="fade-up" data-aos-delay="200">
                                           {{$home_blog_comment->message}}
                                        </p>
                                    @empty
                                        <div class="col-md-10 m-auto">
                                            <div class="alert alert-danger">
                                                <p>No comment to show</p>
                                            </div>
                                        </div>
                                    @endforelse
                                    <h4 class="title">{{$home_blog_area->headline_two}}</h4>
                                    <div class="image-porsion">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="image-left">
                                                    <img class="img-fluid w-100" src="{{asset('upload_photos/blog-front-photo')}}/{{$home_blog_area->blog_front_photo}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="image-left">
                                                    <img class="img-fluid  w-100" src="{{asset('upload_photos/blog-photo')}}/{{$home_blog_area->blog_photo}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-30px">{{$home_blog_area->long_description}}</p>
                                </div>
                            </div>
                            <!-- single blog post -->
                        </div>
                        <div class="blog-single-tags-share d-sm-flex justify-content-between">
                            <div class="blog-single-share mb-xs-15px d-flex" data-aos="fade-up" data-aos-delay="200">
                                <ul class="social">
                                    @foreach ($home_blog_social_icon_data as $home_blog_social_icon )
                                        <li class="m-0">
                                            <a href="{{$home_blog_social_icon->social_icon_link}}"><i class="fa {{$home_blog_social_icon->social_icon}}"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <span class="title"><a class="ml-10px" href="#"> {{$home_blog_comment_all->count()}} <i class="fa fa-comments m-0"></i></a></span>
                            </div>
                        </div>
                        <div class="comment-area">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Comments ({{$home_blog_comment_all->count()}})</h2>
                            <div class="review-wrapper">
                                @forelse ($home_blog_comment_all as $home_blog_comment )
                                    <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                                        <div class="review-img">
                                            <img src="{{asset('frontend')}}/images/comment-image/1.png" alt="" />
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4 class="title">{{$home_blog_comment->name}}</h4>
                                                        <span class="date">{{$home_blog_comment->created_at->format('d M, Y')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>{{$home_blog_comment->message}} </p>
                                                <div class="review-left">
                                                    <a href="{{route('contact')}}">Reply <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-10 m-auto">
                                        <div class="alert alert-danger">
                                            <p>No comment to show</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        {{-- comment area start here --}}
                        <div class="blog-comment-form">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Leave a Comment</h2>
                            <form action="{{route('blog_comment_area')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                        <div class="single-form mb-lm-15px">
                                            <input type="text" name="name" placeholder="Name *" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                        <div class="single-form mb-lm-15px">
                                            <input type="email" name="email" placeholder="Email *" />
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <div class="single-form">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <button class="btn btn-primary btn-hover-dark border-0 mt-30px" type="submit">Post Comment
                                            <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- comment area end here --}}
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </div>
    <!-- Blag Area End -->

@endsection
