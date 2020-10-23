
@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm khách hàng</h4>
                <form class="form-horizontal parsley-examples" action="{{route('customer.save')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng(*)</label>
                        <input autofocus type="text" name="customer_name" class="form-control {{$errors->first('customer_name') ? 'text-danger': ''}}" required="" placeholder="Tên người dùng" value="{{old('username')}}">
                        <span class="{{$errors->first('customer_name') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('customer_name'))
                        <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                    @endif
                    <div class="form-group">
                        <label>E-Mail(*)</label>
                        <div>
                            <input type="email" name="customer_email" class="form-control {{$errors->first('customer_email') ? 'text-danger': ''}}" value="{{old('email')}}" required="" parsley-type="email" placeholder="Địa chỉ email">
                        </div>
                        <span class="{{$errors->first('customer_email') ? 'is-invalid' : ''}}"></span>
                        @if($errors->first('customer_email'))
                            <p class="text-danger">{{ $errors->first('customer_email') }}</p>
                        @endif
                        <span><?php
                            $err=Session::get('message');
                            echo $err;
                            Session::put('message',null);
                            ?></span>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại(*)</label>
                        <input  type="text" name="customer_phone" class="form-control {{$errors->first('customer_phone') ? 'text-danger': ''}}" required="" placeholder="Số điện thoại">
                        <span class="{{$errors->first('customer_phone') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('customer_phone'))
                        <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Địa chỉ(*)</label>
                        <input  type="text" name="customer_address" class="form-control {{$errors->first('customer_address') ? 'text-danger': ''}}" required="" placeholder="Địa chỉ" value="{{old('address')}}">
                        <span class="{{$errors->first('customer_address') ? 'is-invalid' : ''}}"></span>
                    </div>
                    @if($errors->first('customer_address'))
                        <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                    @endif
                    <div class="form-group">
                        <label>Mật khẩu(*)</label>
                        <div>
                            <input name="customer_password" type="password" class="form-control {{$errors->first('customer_password') ? 'text-danger': ''}}" required="" parsley-type="email" placeholder="Mật khẩu">
                            <span class="{{$errors->first('customer_password') ? 'is-invalid' : ''}}"></span>
                        </div>
                        @if($errors->first('customer_password'))
                            <p class="text-danger">{{ $errors->first('customer_password') }}</p>
                        @endif
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
