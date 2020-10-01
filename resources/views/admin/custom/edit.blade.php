
@extends('admin_layout')
@section('admin_content')
    @foreach($custom as $key => $edit)

        <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm khách hàng</h4>

                <form class="form-horizontal parsley-examples" action="{{route('custom.update',$edit->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng(*)</label>
                        <input value="{{$edit->custom_name}}" autofocus type="text" name="custom_name"  class="form-control {{$errors->first('custom_name') ? 'text-danger': ''}}" required="" placeholder="Enter a valid username" value="{{old('username')}}">
                        <span class="{{$errors->first('custom_name') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('custom_name'))
                        <p class="text-danger">{{ $errors->first('custom_name') }}</p>
                    @endif
                    <div class="form-group">
                        <label>E-Mail(*)</label>
                        <div>
                            <input value="{{$edit->custom_email}}" type="email" name="custom_email" class="form-control {{$errors->first('custom_email') ? 'text-danger': ''}}" value="{{old('email')}}" required="" parsley-type="email" placeholder="Enter a valid e-mail">
                        </div>
                        <span class="{{$errors->first('custom_email') ? 'is-invalid' : ''}}"></span>
                        @if($errors->first('custom_email'))
                            <p class="text-danger">{{ $errors->first('custom_email') }}</p>
                        @endif
                        <span><?php
                            $err=Session::get('message');
                            echo $err;
                            Session::put('message',null);
                            ?></span>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại(*)</label>
                        <input value="{{$edit->custom_phone}}" type="text" name="custom_phone" class="form-control {{$errors->first('custom_phone') ? 'text-danger': ''}}" required="" placeholder="Enter a valid phone">
                        <span class="{{$errors->first('custom_phone') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('custom_phone'))
                        <p class="text-danger">{{ $errors->first('custom_phone') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Địa chỉ(*)</label>
                        <input value="{{$edit->custom_address}}" type="text" name="custom_address" class="form-control {{$errors->first('custom_address') ? 'text-danger': ''}}" required="" placeholder="Enter address" value="{{old('address')}}">
                        <span class="{{$errors->first('custom_address') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('custom_address'))
                        <p class="text-danger">{{ $errors->first('custom_address') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Mật khẩu(*)</label>
                        <div>
                            <input value="{{$edit->custom_password}}" name="custom_password" type="password" class="form-control {{$errors->first('custom_password') ? 'text-danger': ''}}" required="" parsley-type="email" placeholder="Enter a valid password">
                            <span class="{{$errors->first('custom_password') ? 'is-invalid' : ''}}"></span>
                        </div>
                        @if($errors->first('custom_password'))
                            <p class="text-danger">{{ $errors->first('custom_password') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Cập nhật
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
            @endforeach
@endsection
