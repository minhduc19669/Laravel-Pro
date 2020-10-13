
@extends('layout.layout')
@section('url','https://images-na.ssl-images-amazon.com/images/I/71GiSOhBeEL.jpg')
@section('content')
        <div class="checkout-area pt-95 pb-70">
            <div class="container">
                <h3 class="page-title">Thanh toán</h3>
                <div class="row">
                    <div class="col-lg-9">
                        Chúc mừng quý khách đã đặt hàng thành công!
                        <br>
                        Mã đơn hàng của quý khách là {{$checkout_code}}.
                        <br>
                        Thông tin xác nhận sẽ được gửi qua email và được nhân viên tư vấn của chúng tôi liên lạc để xác nhận!
                        <br>
                        Cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của chúng tôi !
                        <br>
                        Trân trọng !
                    </div>

@endsection
