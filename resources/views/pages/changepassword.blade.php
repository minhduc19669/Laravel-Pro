       @extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
       <div class="my-account-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Đổi mật khẩu</a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                        <h3></h3>
                                            <div class="billing-information-wrapper">
                                            <form action="{{route('new.password')}}" method="POST">
                                                    @csrf
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nhập mật khẩu hiện tại :</label>
                                                            <input style="width: 300px;margin-left: 60px" required autofocus autocomplete="new-password" name="password" type="password">
                                                            @if($errors->first('password')||Session::get('error'))
                                                                <p style="margin-left: 240px" class="text-danger">{{ $errors->first('password') }}</p>
                                                            @endif
                                                            <?php
                                                            if(Session::get('error'))
                                                                echo '<p style="margin-left: 240px"  class="text-danger">'. Session::get('error').'</p>';
                                                                Session::put('error',null);
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nhập mật khẩu mới:</label>
                                                            <input style="width: 300px;margin-left:95px" required autocomplete="new-password" name="change_password" type="password">
                                                            @if($errors->first('change_password'))
                                                                <p style="margin-left:240px " class="text-danger">{{ $errors->first('change_password') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Nhập lại mật khẩu mới:</label>
                                                            <input style="width: 300px;margin-left:70px" required autocomplete="new-password" name="confirm_password" type="password">
                                                            @if($errors->first('confirm_password'))
                                                                <p style="margin-left:240px " class="text-danger">{{ $errors->first('confirm_password') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class=" ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Đồng ý</button>
                                                    </div>
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
        </div>
@endsection
