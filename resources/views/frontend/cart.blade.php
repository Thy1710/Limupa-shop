@extends('frontend.layout')
@section('title', 'Giỏ Hàng | KTShop')
@section('content')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang Chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Tên</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số Lượng</th>
                                    <th class="li-product-subtotal">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="li-product-remove">
                                        <form action="{{route('remove-cart',$item['id'])}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form> 
                                        </td>
                                        <td class="li-product-thumbnail"><a href="#"><img width="120"
                                                    src="{{ asset('backend/uploaded/' . $item['image'])}} "
                                                    alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a>{{$item['name']}}</a></td>
                                        <td class="li-product-price">
                                            <span class="amount">
                                                {{ isset($item['promotion']) ? number_format($item['price'] - ($item['price'] * $item['promotion']) / 100) : number_format($item['price']) }}đ
                                            </span>
                                        </td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{$item['quantity']}}" min="1"
                                                    type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span
                                                class="amount">{{ (isset($item['promotion']) ? number_format(($item['price'] - ($item['price'] * $item['promotion']) / 100) * $item['quantity']) : number_format($item['price'] * $item['quantity'])) }}đ</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Mã giảm giá " type="text">
                                    <input class="button" name="apply_coupon" value="Thêm Mã Giảm Giá" type="submit">
                                </div>
                                <div class="coupon2">
                                
                                <form action="{{route('update-cart')}}" method="post">
                                    @csrf
                                <input class="button" type="submit" value="Cập Nhật Giỏ Hàng"></input>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2></h2>
                                <ul>
                                    <li>Tổng Phụ <span>800.000đ</span></li>
                                    <li>Giảm <span>30.000đ</span></li>
                                    <li>Tổng <span>770.000đ</span></li>
                                </ul>
                                <a href="{{route('checkout')}}">Thanh Toán</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
@endsection