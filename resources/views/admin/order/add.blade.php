@extends('admin_layout')
@section('admin_content')
    <div class="row mt-4">
        <div class="col-12">
            <h4 class="header-title">Thêm đơn hàng</h4>
            <p class="sub-header">
             Thêm các đơn hàng mới cho website của bạn
            </p>

            <form id="wizard-vertical">

                <h3>Thông tin người gửi</h3>
                <section>
                    <div class="form-group row">

                        <label class="col-lg-2 control-label" for="name1"> Họ và tên *</label>
                        <div class="col-lg-10">
                            <input id="textBox1" name="shipping_name" type="text" class="required form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="surname1">Số điện thoại *</label>
                        <div class="col-lg-10">
                            <input id="textBox2" name="shipping_phone" type="number" class="required form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="email1">Email *</label>
                        <div class="col-lg-10">
                            <input id="email" name="shipping_email" type="text" class="required email form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Địa chỉ *</label>
                        <div class="col-lg-10">
                            <input id="textBox3" name="shipping_address" type="text" class="form-control">
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
                            <input id="textBox10" name="shipping_name_receive" type="text" class="required form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="surname1">Số điện thoại *</label>
                        <div class="col-lg-10">
                            <input id="textBox6" name="shipping_phone_receive" type="number" class="required form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="address1">Địa chỉ *</label>
                        <div class="col-lg-10">
                            <input id="textBox7" name="shipping_address_receive" type="text" class="form-control">
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
                                                   <input min="1" row-id="{{$item->rowId}}" style="text-align: center;" class="update" type="number" name="qtybutton" value="{{$item->qty}}">
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
                        <div  class="col-lg-10">
                           <b id="total">{{$total}}</b>
                        </div>
                    </div>

                </section>
                <h3>Xem lại đơn hàng</h3>
                <section>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled w-list">
                                <li><b>First Name :</b> Jonathan </li>
                                <li><b>Last Name :</b> Smith </li>
                                <li><b>Emial:</b> jonathan@smith.com</li>
                                <li><b>Address:</b> 123 Your City, Cityname. </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <h3>Lưu thông tin đơn hàng</h3>
                <section>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-v" type="checkbox">
                                <label for="checkbox-v"> I agree with the <a href="#">Terms and Conditions</a>. </label>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <!-- End #wizard-vertical -->
        </div>
    </div>

    <!-- end row -->
@endsection
