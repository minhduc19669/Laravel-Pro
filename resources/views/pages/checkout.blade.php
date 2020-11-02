
@extends('layout.layout')
@section('title','Thanh toán giỏ hàng')
@section('url','https://images-na.ssl-images-amazon.com/images/I/71GiSOhBeEL.jpg')
@section('content')
<form action="{{route('cart.infoorder')}}" method="POST">
    @csrf
        <div class="checkout-area pt-95 pb-70">
            <div class="container">
                <h3 class="page-title">Thanh toán</h3>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Thông tin người gửi</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Họ và tên(*)</label>
                                                            <input required autofocus name="name" id="textBox1" type="text">
                                                            @if($errors->first('name'))
                                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if(!Session::get('customer'))
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Email</label>
                                                            <input required name="email" type="email">
                                                        </div>
                                                        @if($errors->first('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                                                    </div>
                                                    @endif
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Số điện thoại</label>
                                                            <input required name="phone" id="textBox2" type="text">
                                                        </div>
                                                        @if($errors->first('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Địa chỉ</label>
                                                            <input required name="address" id="textBox3" type="text">
                                                        </div>
                                                        @if($errors->first('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Chọn tỉnh/thành
                                                                    phố:</label>
                                                            <select required class="form-control city-up" name="city" id="city">
                                                            <option value="">--Tỉnh/Thành Phố--</option>
                                                            @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                        <label>Chọn quận
                                                                huyện:</label>
                                                            <select required class="form-control city-up" name="district" id="district">
                                                            <option value="">--Quận/huyện--</option>
                                                            <option value=""></option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">Thông tin giao hàng</a></h5>
                                    </div>
                                    <div id="payment-3" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Họ và tên</label>
                                                            <input autofocus  name="name_receive" id="textBox10" required type="text">
                                                            @if($errors->first('name_receive'))
                        <p class="text-danger">{{ $errors->first('name_receive') }}</p>
                    @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Số điện thoại</label>
                                                            <input required name="phone_receive" id="textBox6" type="text">

                                                        </div>
                                                                                                                    @if($errors->first('phone_receive'))
                        <p class="text-danger">{{ $errors->first('phone_receive') }}</p>
                    @endif
                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Địa chỉ</label>
                                                            <input required name="address_receive" id="textBox7" type="text">

                                                        </div>
                                                        @if($errors->first('address_receive'))
                        <p class="text-danger">{{ $errors->first('address_receive') }}</p>
                    @endif
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info" style="height: 40px">
                                                            <label>Chọn Tỉnh/thành phố</label>
                                                            <select required class="form-control city-up" name="city_receive" id="district">
                                                            <option value="">--Tỉnh/thành phố--</option>
                                                            @foreach ($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}} </option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div style="height: 40px;" class="billing-info">
                                                        <label>Chọn Quận/huyện</label>
                                                            <select required class="form-control city-up" name="district_receive" id="district">
                                                            <option value="">--Quận/huyện--</option>
                                                            <option value=""> </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input id="click_check" type="checkbox" >
                                                        <label>Giao hàng tới cùng địa chỉ trên</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-4">Hình thức vận chuyển</a></h5>
                                    </div>
                                    <div id="payment-4" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="shipping-method-wrapper">
                                                <div class="shipping-method">
                                                    <p>Giao hàng tận nhà</p>
                                                </div>
                                                {{-- <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-5">Hình thức thanh toán</a></h5>
                                    </div>
                                    <div id="payment-5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input  name="cod" class="radio-check" type="radio" value="1" checked>
                                                        <label>Thanh toán khi nhận hàng</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input  name="cod" class="radio-check" type="radio" value="2" >
                                                        <label>Chuyển khoản qua InternetBanking</label>
                                                    </div>
                                                </div>
                                                {{-- <div class="payment-info">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name on Card </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select card-mrg">
                                                                <label>Credit Card Type</label>
                                                                <select>
                                                                    <option>American Express</option>
                                                                    <option>Visa</option>
                                                                    <option>MasterCard</option>
                                                                    <option>Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Credit Card Number </label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="expiration-date">
                                                        <label>Expiration Date </label>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select month-mrg">
                                                                    <select>
                                                                        <option>Month</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option> March</option>
                                                                        <option>April</option>
                                                                        <option> May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option> October</option>
                                                                        <option> November</option>
                                                                        <option> December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="billing-select">
                                                                    <select>
                                                                        <option>Year</option>
                                                                        <option>2015</option>
                                                                        <option>2016</option>
                                                                        <option>2017</option>
                                                                        <option>2018</option>
                                                                        <option>2019</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                        <option>2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Card Verification Number</label>
                                                                <input type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>*</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Đơn hàng</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Sản phẩm</th>
                                                                    <th class="width-2">Đơn giá</th>
                                                                    <th class="width-3">Số lượng</th>
                                                                    <th class="width-4">Tổng tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($data as $item)
                                                                <tr>
                                                                    <td>
                                                                        <div class="o-pro-dec">
                                                                            <img style="margin-left: 185px" src="{{asset('storage/'.$item->options['image'])}}" alt="" width="100px";height="100px">
                                                                        <p>{{$item->name}}</p>

                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-price">
                                                                        <p>{{number_format($item->price)}}đ</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-qty">
                                                                        <p>{{$item->qty}}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="o-pro-subtotal">
                                                                        <p>{{number_format($item->qty*$item->price)}}đ</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3">Tổng tiền </td>
                                                                <td colspan="1">{{$total}}đ</td>
                                                                </tr>
                                                                {{-- <tr class="tr-f">
                                                                    <td colspan="3">Shipping & Handling (Flat Rate - Fixed</td>
                                                                    <td colspan="1">$45.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">Grand Total</td>
                                                                    <td colspan="1">$4,722.00</td>
                                                                </tr> --}}
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-btn">
                                                            <button type="submit">Hoàn tất đơn hàng</button>
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
                    </form>
@endsection
