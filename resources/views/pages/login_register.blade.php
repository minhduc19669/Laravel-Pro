@extends('layout.layout')
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
                                    <h4> Đăng nhập </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> Đăng kí </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">

                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            @if( Session::get('mess'))
                    <div class="alert alert-danger" role="alert">
                        Sai tên đăng nhập hoặc mật khẩu!
                        <?php
                        Session::put('mess',null);
                        ?>
                    </div>
                @endif
                @if( $errors->all())
                    <div class="alert alert-danger" role="alert">
                        Lỗi đăng nhập!!!
                    </div>
                @endif
                                            <form action="{{route('home.postlogin')}}" method="post">
                                                @csrf
                                                <input type="text" name="email" placeholder="Email">
                                                <input type="password" name="password" placeholder="Password">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Quên mật khẩu</a>
                                                    </div>
                                                    <button type="submit"><span>Đăng nhập</span></button>

                                                </div>
                                                <div style="margin-left:100; ">
                                                    <span style="margin-left: 180px">hoặc đăng nhập bằng</span>
                                                     <button type="submit" style="border-radius: 5px;width:150px;margin-left:5px; " class="btn btn-block btn-social btn-google">
    <span class="fa fa-google"></span>Google+
  </button><button type="submit" style="border-radius: 5px;width:150px;margin-left:5px;" class="btn btn-block btn-social btn-facebook">
    <span class="fa fa-facebook"></span>Facebook
  </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            @if( Session::get('mess'))
                    <div class="alert alert-danger" role="alert">
                        Sai tên đăng nhập hoặc mật khẩu!
                        <?php
                        Session::put('mess',null);
                        ?>
                    </div>
                @endif
                @if( $errors->all())
                    <div class="alert alert-danger" role="alert">
                        Lỗi đăng nhập!!!
                    </div>
                @endif
                                        <form action="{{route('home.register')}}" method="post">
                                            @csrf
                                                <input type="text" name="name" placeholder="Username">
                                                @if($errors->first('name'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                                                <input type="password" name="password" placeholder="Password">
                                                @if($errors->first('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                                                <input name="email" placeholder="Email" type="email">
                                                @if($errors->first('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
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
