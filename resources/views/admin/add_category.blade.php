@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="POST" action="{{url('/save-category')}}">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <textarea type="text" class="form-control" name="category_detail" id="exampleInputEmail1" placeholder="Mô tả danh mục sản phẩm">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tùy chọn hiển thị</label>
                            <select name="category_status" class="form-control input-lg m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection