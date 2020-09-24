
@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm thành viên</h4>
                <form class="form-horizontal parsley-examples" action="{{route('user.store')}}" method="post">
				@csrf
                    <div class="form-group">
                        <label>Tên người dùng(*)</label>
                    <input autofocus type="text" name="username" class="form-control {{$errors->first('username') ? 'text-danger': ''}}" required="" placeholder="Enter a valid username" value="{{old('username')}}">
                        <span class="{{$errors->first('username') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('username'))
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    @endif
                    <div class="form-group">
                        <label>E-Mail(*)</label>
                        <div>
                            <input type="email" name="email" class="form-control {{$errors->first('email') ? 'text-danger': ''}}" value="{{old('email')}}" required="" parsley-type="email" placeholder="Enter a valid e-mail">
                        </div>
                        <span class="{{$errors->first('email') ? 'is-invalid' : ''}}"></span>
                        @if($errors->first('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <span><?php
                            $err=Session::get('message');
                            echo $err;
                            Session::put('message',null);
                            ?></span>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại(*)</label>
                        <input  type="text" name="phone" class="form-control {{$errors->first('phone') ? 'text-danger': ''}}" required="" placeholder="Enter a valid phone">
                        <span class="{{$errors->first('phone') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Địa chỉ(*)</label>
                    <input  type="text" name="address" class="form-control {{$errors->first('address') ? 'text-danger': ''}}" required="" placeholder="Enter address" value="{{old('address')}}">
                        <span class="{{$errors->first('address') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Mật khẩu(*)</label>
                        <div>
                            <input name="password" type="password" class="form-control {{$errors->first('email') ? 'text-danger': ''}}" required="" parsley-type="email" placeholder="Enter a valid password">
                            <span class="{{$errors->first('password') ? 'is-invalid' : ''}}"></span>
                        </div>
                        @if($errors->first('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Chức vụ(*)</label>
                        <div>
                            <select name="role[]" multiple>
							@foreach ($roles as $item)
								<option value="{{$item->id}}">{{$item->role_name}}</option>
							@endforeach
                            </select><br>
                            <i>(Các trường chứa dấu * là bắt buộc !)</i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Tạo mới
                            </button>
                            <button onclick="goBack()" class="btn btn-secondary waves-effect">
                                Trở về
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
@endsection
