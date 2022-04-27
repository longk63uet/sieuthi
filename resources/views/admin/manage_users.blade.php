@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-btn">
           <a href="{{url('/add-user/')}}"> <button class="btn btn-primary" type="button">Thêm người dùng mới</button> </a>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên user</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Vai trò</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }} <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"></td>
                <td>{{ $user->user_phone }}</td>
                <td>{{ $user->user_address }}</td>
                @if ($user->role == 1)
                    <td>Khách hàng</td>
                @else
                    <td>Admin</td>
                @endif
              <td>
                  
                <a onclick="return confirm('Bạn có muốn xóa người dùng này không?')" href="{{URL::to('/delete-user/'.$user->id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
                
              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{-- {!!$user->links()!!} --}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection