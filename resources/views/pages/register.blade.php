
@extends('layout.layout')
@section('title','Đăng kí')
@section('url','https://dietmoitruongan.com/images/b/cho-meo.jpg')
@section('page_name','Hãy trở thành một phần của chúng tôi')
@section('note1','Để được trải nghiệm những tiện ích mua sắm, chế độ chăm sóc khách hàng VIP')
@section('note2','Để được hưởng những ưu đãi, chương trình giảm giá hấp dẫn chỉ áp dụng cho thành viên')
@section('content')
<div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> Đăng kí </h4>
                                </a>
                            </div>
                            <div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('home.postregister')}}" method="post">
                                            @csrf
                                                <input value="{{old('name')}}" type="text" name="name" placeholder="Username">
                                                @if($errors->first('name'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                                                <input type="password" name="password" placeholder="Password">
                                                @if($errors->first('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                                        <input value="{{old('email')}}" name="email" placeholder="Email" type="email">
                                                @if($errors->first('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                                                                            <input value="{{old('phone')}}" name="phone" placeholder="Phone" type="text">
                                                @if($errors->first('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                                                <div class="button-box">
                                                    <button type="submit"><span>Đăng kí</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
