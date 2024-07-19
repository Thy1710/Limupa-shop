@extends('backend.layout')
@section('content')
<main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Danh Sách Danh Mục</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row element-button">
                <div class="col-sm-2">
  
                  <a class="btn btn-add btn-sm" href="{{route('form-add-categories')}}" title="Thêm"><i class="fas fa-plus"></i>
                    Tạo mới danh mục</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                      class="fas fa-file-upload"></i> Tải từ file</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                      class="fas fa-copy"></i> Sao chép</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                      class="fas fa-file-pdf"></i> Xuất PDF</a>
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
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Tình trạng</th>
                    <th>Tính năng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item) 
                  <tr>
                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    @if($item->status == 'Đang hoạt động')
                    <td><span class="badge bg-success">{{$item->status}}</span></td>
                    @else
                    <td><span class="badge bg-danger">{{$item->status}}</span></td>
                    @endif
                    <td><a class="btn btn-primary btn-sm trash" type="button" href="{{ route('delete-categories', ['id' => $item->id]) }}" title="Xóa"><i class="fas fa-trash-alt"></i> </a>
                    <a class="btn btn-primary btn-sm edit" type="button" href="{{ route('edit-categories', ['id' => $item->id]) }}" title="Sửa"><i class="fa fa-edit"></i></a>
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