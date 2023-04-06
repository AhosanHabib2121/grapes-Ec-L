@extends('layouts.frontend_master')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title"><i class="fa fa-users text-danger" aria-hidden="true"></i>
                        Customer Login & Register Page
                    </h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Login & Register</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{route('login.post')}}" method="post">
                                            @csrf
                                            <input type="email" name="email" placeholder="Email">
                                            <input type="password" name="password" placeholder="Password">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{route('customer_register_post')}}" method="post">
                                            @csrf
                                            <input type="text" name="name" placeholder="Username" style="margin-botton:-20px">
                                            @error('name')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <input type="email" name="email" placeholder="Email">
                                            @error('email')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <input type="number" name="phone_number" placeholder="Phone number">
                                            @error('phone_number')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <input type="text" name="address" placeholder="Address">
                                            @error('address')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <input type="password" name="password" placeholder="Password">
                                            @error('password')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <div style="margin:-28px 0 15px 0;">
                                                    <span class="text-danger">{{$message}}</span>
                                                </div>
                                            @enderror
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection
