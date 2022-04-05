@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Họ tên') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('email') }}" required>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Xác nhân mật khẩu') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tỉnh/Thành Phố') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                        <option selected>Chọn Tỉnh/Thành phố</option>
                                        @foreach ($cities as $value)
                                            <option value="{{ $value->matp }}">{{ $value->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Quận/Huyện') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <select name="district" id="district"
                                        class="form-control @error('district') is-invalid @enderror">
                                        <option selected>Chọn Quận/Huyện</option>
                                    </select>
                                    @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="village"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Xã/Phường') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <select name="village" id="village"
                                        class="form-control @error('village') is-invalid @enderror">
                                        <option selected>Chọn Xã/Phường</option>
                                    </select>
                                    @error('village')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ') }} <span class="require">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#city').on('change', function(e) {


                // $('#district').empty();

                var city_id = e.target.value;
                $.ajax({
                    url: "{{ route('district') }}",
                    type: "POST",
                    data: {
                        city_id: city_id
                    },
                    success: function(data) {
                        $('#district').empty();
                        $.each(data.districts, function(index,
                            district) {
                            $('#district').append('<option value="' + district
                                .maqh + '">' + district.name + '</option>');
                        })
                    }
                })
            });

            $('#district').on('change', function(e) {

                var district_id = e.target.value;
                $.ajax({
                    url: "{{ route('village') }}",
                    type: "POST",
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        $('#village').empty();
                        $.each(data.villages, function(index,
                            village) {
                            $('#village').append('<option value="' + village
                                .xaid + '">' + village.name + '</option>');
                        })
                    }
                })
            });
        });
    </script>
@endsection
