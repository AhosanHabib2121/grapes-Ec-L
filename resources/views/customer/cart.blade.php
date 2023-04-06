@extends('layouts.frontend_master');

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Cart page</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div id="cart_area_refrash" class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @forelse ($carts as $cart )
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px"
                                                    src="{{asset('upload_photos/product-photos')}}/{{$cart->relationToproduct->product_thumbnail_photo}}" alt="not found"></a>
                                            </td>
                                            <td class="product-name"><a href="#">
                                                <p>{{$cart->relationToproduct->product_name}}</p>
                                                <p>{{$cart->relationTocolor->color_name}}</p>
                                                <p>{{$cart->relationTosize->size_name}}</p>
                                            </a></td>
                                            <td class="product-price-cart"><span class="amount">{{$cart->product_current_price}}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <span class="d-none">{{$cart->id}}</span>
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                        value="{{$cart->cart_to_amount}}" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                {{$cart->product_current_price * $cart->cart_to_amount}}
                                                @php
                                                    $total += ($cart->product_current_price * $cart->cart_to_amount);
                                                @endphp
                                            </td>
                                            <td class="product-remove">
                                                <a id="{{$cart->id}}" class="remove_button"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center text-danger">
                                            <td colspan="50">No data to show</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{route('index')}}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Shopping Cart</button>
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid"  id="countries_dropdown">
                                                <option>-Select One Country-</option>
                                                @foreach ($countries as $country )
                                                    <option value="{{$country->country_id}}">{{$country->relationTocountry->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * City
                                            </label>
                                            <select class="email s-email s-wid" id="city_dropdown" disabled>
                                                <option value=''>-Select Country first-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input class="mb-2" type="text"  name="name" id="input_coupon_value">
                                    <div class="alert alert-danger d-none" id="coupon_error"></div>
                                    <button class="cart-btn-2 d-none" type="button" id="apply_coupon_btn">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Sub Total <span id="sub_total">{{$total}}</span></h5>
                                <h5>Shopping Charge (+) <span id="shopping_charge">0</span></h5>
                                <h5>Discount Type <span id="discount_type">*</span></h5>
                                <h5>Discount Amount (-) <span id="discount_amount">0</span></h5>
                                <h4 class="grand-totall-title">Grand Total <span id="grand_total">{{$total}}</span></h4>
                                <a href="{{route('checkout')}}" class="d-none" id="checkout_btn">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $current_url=url()->current();
    @endphp
    <!-- Cart Area End -->
@endsection
@section('footer_script_content')
    <script>
        $(document).ready(function(){
            // cart remove code start here
            $('.remove_button').click(function(){
                var cart_id=$(this).attr('id');
                 // ajax start here
                 $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('cart.remove')}}",
                        data:{cart_id:cart_id},
                        success:function(data){
                            var url="{{$current_url}}";
                            $('body').load(url);
                            $('#cart_area_refrash').load(ajax_url + ' #cart_area_refrash');
                        }
                    });
                // ajax end here
            });
            // cart remove code end here
            // cart increment code start here
            $('.inc').click(function(){
                var cart_id=$(this).parent().find("span").html();
                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('cart.update')}}",
                    data:{cart_id:cart_id},
                    success:function(data){
                        var url="{{$current_url}}";
                        $('body').load(url);
                        $('#cart_area_refrash').load(ajax_url + ' #cart_area_refrash');
                    }
                });
                // ajax end here
            });
            // cart dec code start here
            $('.dec').click(function(){
                var cart_id=$(this).parent().find("span").html();
                // ajax start here
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('cart.decrement')}}",
                        data:{cart_id:cart_id},
                        success:function(data){
                            var url="{{$current_url}}";
                            $('body').load(url);
                            $('#cart_area_refrash').load(ajax_url + ' #cart_area_refrash');
                        }
                    });
                // ajax end here
            });
            // countries dropdown code start here
            $('#countries_dropdown').change(function(){
                $('#checkout_btn').addClass('d-none');
                $('#shopping_charge').html(0);
                var country_id=$(this).val();
                 // ajax start here
                 $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('get.cityies')}}",
                        data:{country_id:country_id},

                        success:function(data){
                            $('#city_dropdown').attr('disabled',false)
                            $("#city_dropdown").html(data);
                        }
                    });
            });
            // countries dropdown code end here
            // city dropdown code start here
            $('#city_dropdown').change(function(){
                $('#shopping_charge').html($(this).val());
                $('#checkout_btn').removeClass('d-none');
                var sub_total=$('#sub_total').html();
                var shopping_charge=$(this).val();
                var discount_amount=$('#discount_amount').html();
                var grand_total=parseInt(sub_total) + parseInt(shopping_charge) - parseInt(discount_amount);
                $('#grand_total').html(grand_total);
                var country_id= $('#countries_dropdown :selected').val();
                var city_name= $(this).children("option:selected").html();

                // ajax start here
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{route('set.country.city')}}",
                        data:{country_id:country_id,city_name:city_name},
                        success:function(data){
                        }
                    });
                // ajax end here
            });
            // city dropdown code end here

            // input_coupon_value code start here
            $('#input_coupon_value').keyup(function(){
                $('#apply_coupon_btn').removeClass('d-none');
            });
            // input_coupon_value code end here

            // apply coupon button code start here
            $('#apply_coupon_btn').click(function(){
                var coupon_name = $('#input_coupon_value').val();
                var sub_total="{{$total}}";

                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('check.coupon')}}",
                    data:{coupon_name:coupon_name,sub_total:sub_total},

                    success:function(data){
                        if(data.error){
                            $('#coupon_error').removeClass('d-none');
                            $('#coupon_error').html(data.error);
                        }
                        else{
                            $('#coupon_error').addClass('d-none');
                            $('#discount_type').html(data.coupon_type);
                            $('#discount_amount').html(data.coupon_amount);
                            var shopping_charge=$('#shopping_charge').html();
                            $('#grand_total').html(data.grand_total+ parseInt(shopping_charge));
                        }
                    }
                });
                // ajax end here

            });
            // apply coupon button code end here
        });
    </script>
@endsection

