@extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
        <div class="my-account-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default show">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Tài khoản của bạn </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Thông tin tài khoản</h4>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                        <label><h6>{{$customer->customer_name}}</h6></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>{{$customer->customer_email}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                        <label>0{{$customer->customer_phone}}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái giao hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td class="product-thumbnail">
                                            <p style="margin-left: 70px">#{{$order->order_code}}</p>
                                            </td>
                                        <td class="product-name"><p style="margin-left: 40px">{{$order->created_at->format(' H:m:s D/m/Y')}}</p></td>
                                            <td class="product-price-cart"><span class="amount">{{number_format($order->order_total)}} <u>đ</u></span></td>
                                            <td class="product-quantity">
                                                <div class="">
                                                    @if($order->order_status==0)
                                                    <p style="margin-left: 100px">Chưa giao</p>
                                                    @elseif($order->order_status==1)
                                                    <p style="margin-left: 100px">Đang giao</p>
                                                    @elseif($order->order_status==2)
                                                    <p style="margin-left: 100px">Giao hàng thành công</p>
                                                    @elseif($order->order_status==2)
                                                    <p style="margin-left: 100px">Đã hủy</p>
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="product-wishlist-cart">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
