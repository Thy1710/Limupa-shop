@extends('backend.layout')

@section('content')
<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">Danh sách sản phẩm</li>
      <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo mới sản phẩm</h3>
        <div class="tile-body">
          <form class="row" action="{{ route('add-product') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group col-md-3">
              <label class="control-label">Tên sản phẩm </label>
              <input class="form-control" name="name" type="text" placeholder="">
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Giá</label>
              <input class="form-control" name="price" type="number" min="0" step="500000">
            </div>
            <div class="form-group  col-md-3">
              <label class="control-label">Khuyến Mãi (%)</label>
              <input class="form-control" name="promotion" type="number" min="0" step="5">
            </div>

            <div class="form-group  col-md-3">
              <label class="control-label">Số lượng tồn kho</label>
              <input class="form-control" name="quantity" type="number" min="0" step="5">
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Ram</label>
              <select class="form-control" name="ram" id="exampleSelect1">
                <option disabled selected>-- Chọn --</option>
                <option value="2">2GB</option>
                <option value="4">4GB</option>
                <option value="6">6GB</option>
                <option value="8">8GB</option>
                <option value="10">10GB</option>
                <option value="12">12GB</option>
                <option value="16">16GB</option>
              </select>
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Bộ nhớ lưu trữ</label>
              <select class="form-control" name="storage" id="exampleSelect1">
                <option disabled selected>-- Chọn --</option>
                <option value="8">8GB</option>
                <option value="16">16GB</option>
                <option value="32">32GB</option>
                <option value="64">64GB</option>
                <option value="128">128GB</option>
                <option value="256">256GB</option>
                <option value="512">512GB</option>
                <option value="1024">1024GB</option>
              </select>
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Kích thước màn hình</label>
              <select class="form-control" name="display" id="exampleSelect1">
                <option disabled selected>-- Chọn --</option>
                <option value="Dưới 5 inch">Dưới 5 inch</option>
                <option value="5.5 inch - 6.4 inc">5.5 inch - 6.4 inch</option>
                <option value="Trên 6.5 inch">Trên 6.5 inch</option>
                <option value="Màn hình gập">Màn hình gập</option>
                <option value="Màn hình rời">Màn hình rời</option>
              </select>
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Dung lượng Pin</label>
              <select class="form-control" name="battery_capacity" id="exampleSelect1">
                <option disabled selected>-- Chọn --</option>
                <option value="3000">3000 mA</option>
                <option value="3500">3500 mA</option>
                <option value="4000">4000 mA</option>
                <option value="4500">4500 mA</option>
                <option value="5000">5000 mA</option>
                <option value="5500">5500 mA</option>
                <option value="6000">6000 mA</option>
              </select>
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Hệ Điều Hành</label>
              <select class="form-control" name="operating_system" id="exampleSelect1">
                <option>-- Chọn --</option>
                <option value="android">Android</option>
                <option value="ios">IOS</option>
              </select>
            </div>
            <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Tình trạng</label>
              <select class="form-control" name="status" id="exampleSelect1">
                <option>-- Chọn tình trạng --</option>
                <option value="Hot">Hot</option>
                <option value="Bestseller">Bestseller</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="exampleSelect1" class="control-label">Danh mục</label>
              <select class="form-control" name="category_id" id="exampleSelect1">
                <option disabled selected>-- Chọn danh mục --</option>
                @foreach ($categories as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh sản phẩm</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="image" />
              </div>
              <div id="thumbbox">
                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:"></a>
              </div>


            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="description" id="mota"></textarea>

            </div>
            <button class="btn btn-save" type="submit">Lưu lại</button>
            <a class="btn btn-cancel" href="{{ route('product-list') }}">Hủy bỏ</a>
          </form>
        </div>
      </div>
</main>
@endsection