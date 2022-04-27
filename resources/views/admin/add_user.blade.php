@extends('admin_layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm người dùng mới
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('insert-user')}}" method="POST">
                                   @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                </div>
                             
                                <button type="submit"  class="btn btn-info">Thêm người dùng mới</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection