@extends('backend.layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('form-add-product') }}" title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập"
                                onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file" type="button" title="In"
                                onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button"
                                title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                        </div>

                        <div class="col-sm-2">
                            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất
                                Excel</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In"
                                onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Khuyễn mãi(%)</th>
                                <th>Tình trạng</th>
                                <th>Giá tiền</th>
                                <th>Ram</th>
                                <th>Lưu trữ</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{asset('backend/uploaded/' . $item->image)}}" alt="" width="100px;"></td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->promotion }}</td>
                                    @if($item->quantity == 0)
                                        <td><span class="badge bg-danger">Hết hàng</span></td>
                                    @else
                                        <td><span class="badge bg-success">Còn hàng</span></td>
                                    @endif
                                    <td>{{number_format($item->price)}}đ</td>
                                    <td>{{$item->ram}}</td>
                                    <td>{{$item->battery_capacity}}</td>
                                    <td>{{ $item->category->name ?? 'Chưa có danh mục' }}</td>
                                    <td><a class="btn btn-primary btn-sm trash" type="button"
                                            href="{{route('delete-product', ['id' => $item->id])}}" title="Xóa"><i
                                                class="fas fa-trash-alt"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm edit" type="button"
                                            href="{{route('edit-product', ['id' => $item->id])}}" title="Sửa" id="show-emp"
                                             ><i class="fas fa-edit"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection