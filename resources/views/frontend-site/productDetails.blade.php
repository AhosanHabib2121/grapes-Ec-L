@extends('layouts.frontend_master')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Products</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="{{asset('upload_photos/product-photos')}}/{{$product_details->product_thumbnail_photo}}" alt="not found">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container zoom-thumbs mt-3 mb-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="{{asset('upload_photos/product-photos')}}/{{$product_details->product_thumbnail_photo}}" alt="not found">
                            </div>
                            @forelse ($product_feature_photo_info as $feature_photo )
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{asset('upload_photos/product-feature-photos')}}/{{$feature_photo->product_feature_photo_name}}" alt="not found">
                                </div>
                            @empty

                            @endforelse

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2>{{$product_details->product_name}}</h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="text-success">${{$product_details->discounted_price}}</li>
                                @if ($product_details->discounted_price != $product_details->regular_price)
                                    <li class="text-danger">${{$product_details->regular_price}}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                @if ($product_review->average('rating'))
                                    @for ($start=1; $start<=round($product_review->average('rating')); $start++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <span class="read-review"><a class="reviews" href="#">( {{$product_review->count()}} Customer Review )</a></span>
                        </div>
                        <div class="pro-details-color-info d-flex align-items-center">
                            <input type="hidden" id="i_color_id">
                            <input type="hidden" id="i_size_id">
                            <span>Color</span>
                            <div class="pro-details-color">
                                <ul>
                                    @forelse ($inventory_data as $inventory )
                                        <li id="{{$inventory->color_id}}" class="color_plate" title="{{$inventory->relationTocolor->color_name}}"><a class="{{($loop->first)?'active-color':''}}" style="background: {{$inventory->relationTocolor->color_code}}"></a></li>
                                    @empty
                                        <span class="badge bg-danger text-white">Color Not Avaliable</span>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="pro-details-size-info d-flex align-items-center">
                            <span>Size</span>
                            <div class="pro-details-size">
                                <select  id="size_dropdown" class="form-control">
                                    <option value="">Please choose color first</option>
                                </select>
                            </div>
                        </div>
                        <p>
                            <label>Available Stock :</label>
                            <span id="available_stock" class="badge bg-success">{{$total_inventories}}</span>
                        </p>
                        <p class="m-0">{{$product_details->short_description}}</p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input id="cart_to_amount" class="cart-plus-minus-box" type="text" name="qtybutton" value="" />
                            </div>
                            <div class="pro-details-cart">
                                <button id="cart_button" class="add-cart" href="#"> Add To Cart</button>
                                @auth
                                    <input type="hidden" id="cart_status" value="yes">
                                @else
                                    <input type="hidden" id="cart_status" value="no">
                                @endauth
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
                                    <a href="#">{{$product_details->sku}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Categories: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{$product_details->relationTocategory->category_name}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex">
                            <span>Subcategories: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">{{$product_details->relationTosubcategory->subcategory_name}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="http://www.facebook.com/sharer/sharer.php?u={{url()->full()}}&t={{$product_details->product_name}}" target="_blank" class="share-popup"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com/intent/tweet?url={{url()->full()}}&via=TWITTER_HANDLE_HERE&text={{$product_details->product_name}}" target="_blank" class="share-popup"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com?url={{url()->full()}}" target="_blank" class="share-popup"><i class="fa fa-google"></i></a>
                                </li>
                                {{-- <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product details description area start -->
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details2">Information</a>
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                    <a data-bs-toggle="tab" href="#des-details3">Reviews ({{$product_review->count()}})</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper text-start">
                            <ul>
                                <li><span>Weight</span> {{$product_details->weight}}</li>
                                <li><span>Dimensions</span>{{$product_details->dimensions}}</li>
                                <li><span>Materials</span> {{$product_details->materials}}</li>
                                <li><span>Other Info</span> {{$product_details->other_info}}</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>{!!$product_details->long_description!!}</p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            @forelse ($product_review as $review )
                                <div class="col-lg-7">
                                    <div class="review-wrapper">
                                        <div class="single-review">
                                            <div class="review-img">
                                                <img src="{{asset('frontend')}}/images/review-image/1.png" alt="" />
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4>{{App\Models\User::find($review->user_id)->name}}</h4>
                                                        </div>
                                                        <div class="rating-product">
                                                            @for ($start=1; $start<=$review->rating; $start++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>
                                                        {{$review->review}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-danger">No Review to Show</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->

    <!-- Related product Area Start -->
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">
                    @forelse ($relative_product as $product )
                        <div class="new-product-item swiper-slide">
                            <!-- Single Prodect -->
                            @include('parts.product')
                        </div>
                    @empty

                    @endforelse

                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related product Area End -->
@endsection
{{-- footer script content code start here --}}
@section('footer_script_content')
    <script>
        // this js code for color is used
        $(document).ready(function(){
            $('.color_plate').click(function(){
                var color_id=$(this).attr('id');
                var product_id="{{$product_details->id}}";
                $('#i_color_id').val(color_id);
                $('#i_size_id').val('');

                // ajax start here
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('get.sizes')}}",
                        data:{product_id:product_id,color_id:color_id},

                        success:function(data){
                            $('#size_dropdown').html(data)
                        }
                    });
                // ajax end here
            });
            $('#size_dropdown').change(function(){
                var size_id=$(this).val();
                $('#i_size_id').val(size_id);
                $('#cart_to_amount').val('1');
                var color_id=$('#i_color_id').val();
                var product_id="{{$product_details->id}}";

                // ajax start here
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('get.inventory')}}",
                        data:{product_id:product_id,color_id:color_id,size_id:size_id},

                        success:function(data){
                            $('#available_stock').html(data)
                        }
                    });
                // ajax end here
            });
            $('#cart_button').click(function (){
                if($('#cart_status').val() == 'no'){
                    Swal.fire({
                        title: 'Your are logged in',
                        text: "please login first",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Go to login'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href="{{route('customer.login')}}";
                        }
                    })
                }
                else{
                    var available_stock=parseInt($('#available_stock').html());
                    var cart_to_amount=parseInt($('#cart_to_amount').val());
                    if(cart_to_amount > available_stock){
                        Swal.fire({
                            icon: 'error',
                            title: 'Stock not available',
                            text: "You've gone through a lot!",
                        })
                    }
                    else{
                        if(isNaN(cart_to_amount)){
                            Swal.fire({
                                icon: 'error',
                                title: 'Please Choose color & size first',
                                text: "Important!",
                            })
                        }
                        else{
                            if(cart_to_amount <= 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Cart amount can not less than or equal 0',
                                    text: "Important!",
                                })
                            }
                            else{
                                var product_id="{{$product_details->id}}";
                                var product_current_price="{{$product_details->discounted_price}}";
                                var color_id=$('#i_color_id').val();
                                var size_id=$('#i_size_id').val();
                                var cart_to_amount=$('#cart_to_amount').val();
                                var user_id="{{auth()->id()}}";

                                // ajax start here
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    type:'POST',
                                    url:"{{route('insert.cart')}}",
                                    data:{product_id:product_id,product_current_price:product_current_price,color_id:color_id,size_id:size_id,cart_to_amount:cart_to_amount,user_id:user_id},

                                    success:function(data){
                                        $('#header_cart_num').html(data.cart_amount_status + parseInt($('#header_cart_num').html()));
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Cart Added Successfully!',
                                            text: "Important!",
                                        })
                                    }
                                });
                                // ajax end here
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
{{-- footer script content code end here --}}

