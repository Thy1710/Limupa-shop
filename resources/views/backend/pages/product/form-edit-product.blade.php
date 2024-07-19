@extends('backend.layout')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách sản phẩm</li>
            <li class="breadcrumb-item"><a href="#">Sửa sản phẩm</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa sản phẩm</h3>
                <div class="tile-body">
                    <form class="row" action="{{ route('update-product', ['id' => $products->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm </label>
                            <input class="form-control" name="name" type="text" value="{{$products->name}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Giá</label>
                            <input class="form-control" name="price" value="{{$products->price}}" type="number" min="0"
                                step="1000000">
                        </div>
                        <div class="form-group  col-md-3">
                            <label class="control-label">Khuyến Mãi (%)</label>
                            <input class="form-control" name="promotion" value="{{$products->promotion}}" type="number"
                                min="0" step="5">
                        </div>

                        <div class="form-group  col-md-3">
                            <label class="control-label">Số lượng tồn kho</label>
                            <input class="form-control" name="quantity" value="{{$products->quantity}}" type="number"
                                min="0" step="5">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Ram</label>
                            <select class="form-control" name="ram" id="exampleSelect1">
                                <option disabled selected>-- Chọn --</option>
                                <option value="2" {{ $products->ram == 2 ? 'selected' : '' }}>2GB</option>
                                <option value="4" {{ $products->ram == 4 ? 'selected' : '' }}>4GB</option>
                                <option value="6" {{ $products->ram == 6 ? 'selected' : '' }}>6GB</option>
                                <option value="8" {{ $products->ram == 8 ? 'selected' : '' }}>8GB</option>
                                <option value="10" {{ $products->ram == 10 ? 'selected' : '' }}>10GB</option>
                                <option value="12" {{ $products->ram == 12 ? 'selected' : '' }}>12GB</option>
                                <option value="16" {{ $products->ram == 16 ? 'selected' : '' }}>16GB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Bộ nhớ lưu trữ</label>
                            <select class="form-control" name="storage" id="exampleSelect1">
                                <option disabled selected>-- Chọn --</option>
                                <option value="8" {{ $products->storage == 8 ? 'selected' : '' }}>8GB</option>
                                <option value="16" {{ $products->storage == 16 ? 'selected' : '' }}>16GB</option>
                                <option value="32" {{ $products->storage == 32 ? 'selected' : '' }}>32GB</option>
                                <option value="64" {{ $products->storage == 64 ? 'selected' : '' }}>64GB</option>
                                <option value="128" {{ $products->storage == 128 ? 'selected' : '' }}>128GB</option>
                                <option value="256" {{ $products->storage == 256 ? 'selected' : '' }}>256GB</option>
                                <option value="512" {{ $products->storage == 512 ? 'selected' : '' }}>512GB</option>
                                <option value="1024" {{ $products->storage == 1024 ? 'selected' : '' }}>1024GB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Kích thước màn hình</label>
                            <select class="form-control" name="display" id="exampleSelect1">
                                <option disabled selected>-- Chọn --</option>
                                <option value="Dưới 5 inch" {{ $products->display == 'Dưới 5 inch' ? 'selected' : '' }}>
                                    Dưới 5 inch</option>
                                <option value="5.5 inch - 6.4 inc" {{ $products->display == '5.5 inch - 6.4 inc' ? 'selected' : '' }}>5.5 inch - 6.4 inch</option>
                                <option value="Trên 6.5 inch" {{ $products->display == 'Trên 6.5 inch' ? 'selected' : '' }}>Trên 6.5 inch</option>
                                <option value="Màn hình gập" {{ $products->display == 'Màn hình gập' ? 'selected' : '' }}>
                                    Màn hình gập</option>
                                <option value="Màn hình rời" {{ $products->display == 'Màn hình rời' ? 'selected' : '' }}>
                                    Màn hình rời</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Dung lượng Pin</label>
                            <select class="form-control" name="battery_capacity" id="exampleSelect1">
                                <option disabled selected>-- Chọn --</option>
                                <option value="3000" {{ $products->battery_capacity == 3000 ? 'selected' : '' }}>3000 mAh
                                </option>
                                <option value="3500" {{ $products->battery_capacity == 3500 ? 'selected' : '' }}>3500 mAh
                                </option>
                                <option value="4000" {{ $products->battery_capacity == 4000 ? 'selected' : '' }}>4000 mAh
                                </option>
                                <option value="4500" {{ $products->battery_capacity == 4500 ? 'selected' : '' }}>4500 mAh
                                </option>
                                <option value="5000" {{ $products->battery_capacity == 5000 ? 'selected' : '' }}>5000 mAh
                                </option>
                                <option value="5500" {{ $products->battery_capacity == 5500 ? 'selected' : '' }}>5500 mAh
                                </option>
                                <option value="6000" {{ $products->battery_capacity == 6000 ? 'selected' : '' }}>6000 mAh
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Hệ Điều Hành</label>
                            <select class="form-control" name="operating_system" id="exampleSelect1">
                                <option>-- Chọn --</option>
                                <option value="android" {{ $products->operating_system == 'android' ? 'selected' : '' }}>
                                    Android</option>
                                <option value="ios" {{ $products->operating_system == 'ios' ? 'selected' : '' }}>IOS
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Tình trạng</label>
                            <select class="form-control" name="status" id="exampleSelect1">
                                <option>-- Chọn trạng thái --</option>
                                <option value="Hot" {{ $products->status == 'Hot' ? 'selected' : '' }}>Hot
                                </option>
                                <option value="Bestseller" {{ $products->status == 'Bestseller' ? 'selected' : '' }}>Bestseller
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" name="category_id" id="exampleSelect1">
                                <option disabled selected>-- Chọn danh mục --</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{ $products->category_id == $item->id ? 'selected' : '' }}>
                                        {{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" name="image" />
                            </div>
                            <div id="thumbbox">
                                @if($products->image)
                                    <img src="{{ asset('backend/uploaded/' . $products->image) }}" height="" width="120"
                                        alt="Current product image" />
                                @endif
                                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>


                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="description" value="" id="mota">{{$products->description}}</textarea>

                        </div>
                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="{{ route('product-list') }}">Hủy bỏ</a>
                    </form>
                </div>
            </div>
</main>
@endsection