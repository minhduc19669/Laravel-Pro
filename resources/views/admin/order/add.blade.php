@extends('admin_layout')
@section('admin_content')
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="header-title">Thêm đơn hàng</h4>
            <p class="sub-header">
             Thêm các đơn hàng mới cho website của bạn
            </p>

            <form action="{{route('cart.infoorderAdmin')}}" method="POST" id="wizard-vertical">
                @csrf
                <h3>Thông tin người gửi</h3>
                <section>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label" for="name1"> Họ và tên *</label>
                        <div class="col-lg-10">
                            <input id="textBox1" name="name" type="text" class="required form-control">
                            @if($errors->first('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="surname1">Số điện thoại *</label>
                        <div class="col-lg-10">
                            <input id="textBox2" name="phone" type="number" class="required form-control">
                            @if($errors->first('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="email1">Email *</label>
                        <div class="col-lg-10">
                            <input id="email" name="email" type="text" class="required email form-control">
                            @if($errors->first('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Địa chỉ *</label>
                        <div class="col-lg-10">
                            <input id="textBox3" name="address" type="text" class="form-control">
                            @if($errors->first('address'))
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Thành phố *</label>
                        <div class="col-lg-10">
                            <div class="input-group mb-3">
                                <select name="city" class="custom-select" id="city">
                                    <option selected>--Tỉnh\Thành phố--</option>
                                   @foreach($shipping_city as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Quận/huyện *</label>
                        <div class="col-lg-10">
                            <div class="input-group mb-3">
                                <select name="district" class="custom-select" id="district">
                                    <option value="" selected>--Quận\huyện--</option>
                                    <option value=""></option>

                                </select>
                            </div>                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label ">(*) Mandatory</label>
                    </div>

                </section>
                <h3>Thông tin người nhận</h3>
                <section>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label" for="name1"> Họ và tên *</label>
                        <div class="col-lg-10">
                            <input id="textBox10" name="name_receive" type="text" class="required form-control">
                            @if($errors->first('name_receive'))
                                <p class="text-danger">{{ $errors->first('name_receive') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="surname1">Số điện thoại *</label>
                        <div class="col-lg-10">
                            <input id="textBox6" name="phone_receive" type="number" class="required form-control">
                            @if($errors->first('phone_receive'))
                                <p class="text-danger">{{ $errors->first('phone_receive') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Địa chỉ *</label>
                        <div class="col-lg-10">
                            <input id="textBox7" name="address_receive" type="text" class="form-control">
                            @if($errors->first('address_receive'))
                                <p class="text-danger">{{ $errors->first('address_receive') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Thành phố *</label>
                        <div class="col-lg-10">
                            <div class="input-group mb-3">
                                <select name="city_receive" class="custom-select" id="city_receive">
                                    <option selected>--Tỉnh\Thành phố--</option>
                                    @foreach($shipping_city as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Quận/huyện *</label>
                        <div class="col-lg-10">
                            <div class="input-group mb-3">
                                <select name="district_receive" class="custom-select" id="district_receive">
                                    <option value="" selected>--Quận\huyện--</option>
                                    <option value=""></option>

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


                </section>
                <h3>lựa chọn sản phẩm</h3>
                <section>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="userName1">Sản phẩm</label>
                        <div class="col-lg-10">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Ảnh</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $key =>$product)
                                        <tr id="item_order{{$product->product_id}}">
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$product->product_code}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_price}}</td>
                                            <td><img width="50px" src="{{asset('storage/'.$product->product_image)}}" alt=""></td>
                                            <td><a id="orderProduct"  data-id="{{$product->product_id}}" class="btn  btn-success delete" type="submit">Chọn</a></td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    </div>

                </section>
                <h3>Giỏ hàng</h3>
                <section>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="userName1">Xem đơn hàng</label>
                        <div class="col-lg-10">
                            <div class="input-group mb-3">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody class="tbodyCart">
                                        @foreach($data as $item)
                                           <tr id="item_id{{$item->rowId}}">
                                               <td> <img width="50px" alt="" src="{{asset('storage/'.$item->options['image'])}}"/></td>
                                               <td>{{$item->name}}</td>
                                               <td>{{$item->price}}</td>
                                               <td>
                                                   <input min="1" row-id="{{$item->rowId}}" style="text-align: center;" id="update" type="number" name="qtybutton" value="{{$item->qty}}">
                                               </td>
                                               <td><span id="price-item{{$item->rowId}}">{{number_format($item->price*$item->qty)}}</span></td>
                                               <td>
                                                   <a class="btn  btn-danger delete"  style="cursor: pointer;" id="deleteitem" item-id="{{$item->rowId}}">Xóa</a>
                                               </td>
                                           </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="password1">Thành tiền</label>
                        <div id="total" style="margin-top: 8px"  class="col-lg-10 ">
                         {{($total)}} vnđ
                        </div>
                    </div>

                </section>
                <h3>Phương thức thanh toán</h3>
                <section>

                    <div class="mt-4">
                        <p class="text-muted font-13">Phương thức thanh toán</p>
                        <div name="cođ" class="radio radio-info form-check-inline">
                            <input type="radio" id="inlineRadio1" value="1" name="radioInline" checked="">
                            <label for="inlineRadio1"> Thanh toán khi nhận hàng </label>
                        </div>
                        <div id="bank" class="radio form-check-inline">
                            <input type="radio" id="inlineRadio2" value="2" name="radioInline">
                            <label for="inlineRadio2"> Chuyển khoản qua InternetBanking </label>
                        </div>
                    </div>
                </section>
                <h3>Xem lại đơn hàng</h3>
                <section>
                    <div class="form-group row">
{{--                        <div class="col-lg-6">--}}
{{--                            <ul class="list-unstyled w-list">--}}
{{--                                <li ><b id="text_12">Người gửi :</b>  </li>--}}
{{--                                <li ><b id="text_13">Số điện thoại:</b> Smith </li>--}}
{{--                                <li ><b id="text_14">Address:</b> 123 Your City, Cityname. </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="col-lg-6">
                            <ul class="list-unstyled w-list">
                                <li id="total_x"><b>Tổng số tiền:</b>{{$total}}</li>
                                <li id="count_x"><b>Số đơn hàng:</b> {{$count}} </li>
                                <li ><b id="text_14">Trạng thái:</b> Chưa giao </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled w-list">
                                <li id="text_12" ><b >Người nhận :</b>  </li>
                                <li id="text_13"><b>Số điện thoại:</b> Smith </li>
                                <li id="text_14"><b>Address:</b> 123 Your City, Cityname. </li>
                            </ul>
                        </div>

                    </div>

                </section>
                <h3>Lưu thông tin đơn hàng</h3>
                <section style="text-align: center;margin-top: 80px">
                    <button class="btn btn-primary waves-effect waves-light btn-lg">Tiến hành đặt hàng</button>
                </section>

            </form>

            <!-- End #wizard-vertical -->
        </div>
    </div>

    <!-- end row -->
@endsection
