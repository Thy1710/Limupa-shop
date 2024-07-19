@extends('backend.layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh Sách Danh Mục</li>
            <li class="breadcrumb-item"><a href="#">Thêm Danh Mục</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới danh mục </h3>
                <div class="tile-body">

                    <form class="row" action="{{route('add-categories')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên Danh Mục</label>
                            <input class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="exampleSelect1" class="control-label">Tình trạng</label>
                            <select class="form-control" name="status" id="exampleSelect1" required>
                                <option disabled selected>-- Chọn tình trạng --</option>
                                <option value="Đang hoạt động">Đang hoạt động</option>
                                <option value="Tạm ngưng">Tạm ngưng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="description" id="mota"></textarea>
                        </div>
                        <button class="btn btn-save" type="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="{{route('categories-list')}}">Hủy bỏ</a>
                    </form>
                </div>

            </div>
</main>


<!--
  MODAL CHỨC VỤ 
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <span class="thong-tin-thanh-toan">
                            <h5>Thêm mới nhà cung cấp</h5>
                        </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Nhập tên chức vụ mới</label>
                        <input class="form-control" type="text" required>
                    </div>
                </div>
                <BR>
                <button class="btn btn-save" type="button">Lưu lại</button>
                <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection