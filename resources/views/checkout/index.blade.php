@extends("layouts.frontend_master");

@section('content')
     <!-- breadcrumb-area start -->
     <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Checkout Page</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->


    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                    <div class="col-lg-7">
                        <form action="{{route('checkout.post')}}" method="POST">
                            @csrf
                            <div class="billing-info-wrap">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Name</label>
                                            <input type="text" name="customer_name" value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Email</label>
                                            <input type="text" name="customer_email" value="{{auth()->user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Country Name</label>
                                            <input type="text" name="customer_country_name" value="{{App\Models\Countrie::find(session('s_country_id'))->name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>City Name</label>
                                            <input type="text" name="customer_city_name" value="{{session('s_city_name')}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Address</label>
                                            <input type="text" name="customer_address" class="billing-address" placeholder="House number and street name" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="billing-info mb-4">
                                            <label>Phone</label>
                                            <input type="text" name="customer_phone_number">
                                        </div>
                                    </div>
                                </div>

                                <div class="additional-info-wrap">
                                    <h4>Additional information</h4>
                                    <div class="additional-info">
                                        <label>Order notes</label>
                                        <textarea name="customer_order_notes" placeholder="Notes about your order, e.g. special notes for delivery. "></textarea>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Sub Total</li>
                                            <li>{{$sub_total}}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">After Coupon Total</li>
                                            <li>{{$after_coupon_total}}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Shipping Charge</li>
                                            <li>{{$shopping_charge}}</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Grand Total</li>
                                            <li>{{$grand_total}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <h6>
                                        Payment Method
                                    </h6>
                                    <select name="payment_method" class="form-control" >
                                        <option value="cod">Cash On Delivery (COD)</option>
                                        <option value="online">Online (Card,Bkash,Rocket,Nagad,etc)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <style>
                                    .place_order{
                                        background-color:#fb5d5d;color:#fff;display:block;
                                        font-weight:700;letter-spacing:1px;line-height:1;
                                        padding:18px 20px;text-align:center;text-transform:uppercase;
                                        border-radius:0;z-index:9;
                                    }
                                </style>
                                <button class="place_order">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection
