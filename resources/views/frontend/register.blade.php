@extends('frontend.layout')
@section('title', 'Đăng Ký | KTShop')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active">Đăng Ký</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30"> -->
            <!-- Login Form s-->
            <!-- <form action="#" >
                                <div class="login-form">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Forgotten pasward?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
            <!-- </div> -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{ route('postRegister') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đăng Ký</h4>
                        <div class="row">
                            <div class="col-12 mb-20">
                                <label>Họ Và Tên</label>
                                <input class="mb-0" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Nhập Họ và Tên của bạn...">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Địa chỉ Email*</label>
                                <input class="mb-0" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="Nhập vào Email...">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Mật Khẩu</label>
                                <input class="mb-0" type="password" name="password" placeholder="Mật Khẩu">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input class="mb-0" type="password" name="password_confirmation"
                                    placeholder="Nhập Lại Mật Khẩu">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="register-button mt-0">Đăng Ký</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->
@endsection