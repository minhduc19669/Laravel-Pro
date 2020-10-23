@extends('admin_layout')
@section('admin_content')
<<<<<<< HEAD
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
                                        @foreach($product as $key =>$product)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$product->product_code}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_price}}</td>
                                            <td><img width="50px" src="{{asset('storage/'.$product->product_image)}}" alt=""></td>
                                            <td><a id="cartOrder" product-id="{{$product->product_id}}" class="btn btn-outline-success" >Chọn</a></td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                </section>
                <h3>Đơn hàng</h3>
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
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="password1"> Giá tiền</label>
                        <div class="col-lg-10">
                            <p id="price"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="password1"> Số lượng</label>
                        <div class="col-lg-10">
                            <input id="password1" name="password" type="text" class="required form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 control-label " for="password1">Tổng tiền</label>
                        <div class="col-lg-10">
                            <input id="password1" name="password" type="text" class="required form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-12 control-label ">(*) Mandatory</label>
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
=======
    <form action="{{route('order.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Thêm đơn hàng</h2>
        <div class="row">
            <div class="col-md-8">

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label  for="brand" >Khách hàng</label>
                        <select name="shipping_order" class="form-control">
                            @foreach($shipping as $key => $cate)
                                <option value="{{$cate->id}}">{{$cate->shipping_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('shipping_order'))
                            <p style="color: red">{{ $errors->first('shipping_order') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-8">
                        <label for="price">Tổng tiền</label>
                        <input type="number" class="form-control" name="order_total" placeholder="Tổng giá tiền">
                    </div>

                </div>
                @if ($errors->has('order_total'))
                    <p style="color: red">{{ $errors->first('order_total') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="order_status">
                            <option value="0">Chưa giao </option>
                            <option value="1">Đang giao</option>
                            <option value="2">Đã giao</option>
                            <option value="3">Hủy đơn hàng</option>
                        </select>
                        @if ($errors->has('order_status'))
                            <p style="color: red">{{ $errors->first('order_status') }}</p>
                        @endif
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>

    </form>

>>>>>>> e89e83e45017d9d694b518f2d529e77a3fdcdf3a


@endsection
