@extends('admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục blog
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($data as $blogcate)
                        <form role="form" method="POST" action="{{url('/update-blog-category/'.$blogcate->blogcategory_id)}}">
                            @csrf
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="blogcategory" id="exampleInputEmail1" value={{$blogcate->blogcategory_name}}>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tùy chọn hiển thị</label>
                            <select name="blogcategory_status" value=@php ($blogcate->blogcategory_status==1)? "Hiển thị": "Ẩn" @endphp class="form-control input-lg m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        @endforeach
                        <button type="submit" name="submit" class="btn btn-info">Sửa danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection