@extends('backend.layout')

@section('content')

<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh Sách Danh Mục</li>
            <li class="breadcrumb-item"><a href="#">Sửa Danh Mục</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa danh mục </h3>
                <div class="tile-body">
                    <form class="row" action="{{ route('update-categories', ['id' => $categories->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên Danh Mục</label>
                            <input class="form-control" name="name" type="text" value="{{ $categories->name }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Tình trạng</label>
                            <select class="form-control" name="status" id="exampleSelect1" required>
                                <option disabled>-- Chọn tình trạng --</option>
                                <option value="Đang hoạt động" {{ $categories->status == 'Đang hoạt động' ? 'selected' : '' }}>Đang hoạt động</option>
                                <option value="Tạm ngưng" {{ $categories->status == 'Tạm ngưng' ? 'selected' : '' }}>Tạm ngưng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="description" id="mota">{{ $categories->description }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
