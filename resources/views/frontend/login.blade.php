@extends('frontend.layout')
@section('title','Đăng Nhập | KTShop')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('home')}}">Trang Chủ</a></li>
                            <li class="active">Đăng Nhập</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="{{ route('postLogin') }}" method="post">
    @csrf
    <div class="login-form">
        <h4 class="login-title">Đăng Nhập</h4>
        <div class="row">
            <div class="col-md-12 col-12 mb-20">
                <label>Địa Chỉ Email*</label>
                <input class="mb-0" type="email" name="email" value="{{ old('email') }}" placeholder="Nhập vào Email...">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-20">
                <label>Mật Khẩu</label>
                <input class="mb-0" type="password" name="password" placeholder="Mật Khẩu">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if (session('error'))
                <div class="col-12 mb-20">
                    <div class="alert alert-danger">{{ session('error') }}</div>
                </div>
            @endif
            <div class="col-md-8">
                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                    <input type="checkbox" id="remember_me">
                    <label for="remember_me">Lưu đăng nhập</label>
                </div>
            </div>
            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                <a href="#"> Quên mật khẩu?</a>
            </div>
            <div class="col-md-12">
                <button class="register-button mt-0">Đăng Nhập</button>
            </div>
        </div>
    </div>
</form>

                        </div>
                        <!-- <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="#">
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name</label>
                                            <input class="mb-0" type="text" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name</label>
                                            <input class="mb-0" type="text" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Confirm Password</label>
                                            <input class="mb-0" type="password" placeholder="Confirm Password">
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
@endsection