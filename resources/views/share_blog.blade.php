@include('header')
<div class="row">
    <div class="col-lg-4">
        <p>Cùng chia sẻ công thức nấu ăn, đổi quà khủng</p>
    </div>
    <div class="col-lg-8">
        <h2 style="text-align: center">Chia sẻ công thức nấu ăn ngon</h2>
    <form role="form" method="POST" action="{{url('/add-blog')}}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề Blog</label>
        <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control" name="title" placeholder="Nhập tiêu đề Blog">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Ảnh minh họa</label>
        <input type="file" class="form-control" name="images" id="exampleInputEmail1" >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tóm tắt</label>
        <textarea id="editor2" style="resize :none" rows="4" type="text" class="form-control" name="summary"  placeholder="Mô tả ngắn">
        </textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả chi tiết</label>
        <textarea id="editor3" style="resize :none" rows="8" type="text" class="form-control" name="content"  placeholder="Mô tả Blog">
        </textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Danh mục blog</label>
        <select name="blogcategory_id" class="form-control input-lg m-bot15">
            @foreach ($blogcate as $cate)
            <option value="{{$cate->blogcategory_id}}">{{$cate->blogcategory_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Sản phẩm giới thiệu</label>
        <select class="form-control" multiple  name="product[]" rows = "5">
            @foreach ($products as $pro)
            <option value="{{$pro->product_id}}">{{$pro->product_name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Gửi bài viết</button>
</form>
</div>
</div>

@include('footer')




