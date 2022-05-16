@include('header')
@include('nav_user')
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="myTable">
                    <thead>
                        <tr>
                            <th>Điểm</th>
                            <th>Quà tặng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gifts as $gift)
                            
                        
                        <tr>
                            <td>{{$gift->point}}</td>
                            <td>{{$gift->gift}}</td>
                            <td>
                                <a href="javascript:" onclick="exchangepoint({{$gift->id}})">
                                    <button class="btn btn-primary">Đổi quà</button>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('footer')

