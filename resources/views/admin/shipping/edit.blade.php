@extends('admin_layout')
@section('admin_content')

    @foreach($shipping as $key => $edit)
        <form action="{{route('shipping.update',$edit->id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
            {{csrf_field()}}
            <h2>Cập nhật thông tin giao hàng</h2>
            <br>
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="modelName">Tên người gửi</label>
                            <input value="{{$edit->shipping_name}}" type="text" class="form-control" name="shipping_name" placeholder="Tên người gửi">
                            @if ($errors->has('shipping_name'))
                                <p style="color: red">{{ $errors->first('shipping_name') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label for="modelName">Tên người nhận</label>
                            <input value="{{$edit->shipping_name_receive}}" type="text" class="form-control" name="shipping_name_receive" placeholder="Tên người nhận">
                            @if ($errors->has('shipping_name_receive'))
                                <p style="color: red">{{ $errors->first('shipping_name_receive') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-row col-md-12">
                            <div class="form-group col-md-5">
                                <label for="modelName">Số điện thoại người gửi</label>
                                <input value="{{$edit->shipping_phone}}"  type="text" class="form-control" name="shipping_phone" placeholder="Số điện thoại người gửi">
                                @if ($errors->has('shipping_phone'))
                                    <p style="color: red">{{ $errors->first('shipping_phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="modelName">Số điện thoại người nhận</label>
                                <input value="{{$edit->shipping_phone_receive}}"  type="text" class="form-control" name="shipping_phone_receive" placeholder="Số điện thoại người nhận">
                                @if ($errors->has('shipping_phone_receive'))
                                    <p style="color: red">{{ $errors->first('shipping_phone_receive') }}</p>
                                @endif
                            </div>


                        </div>
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-5">
                                <label for="price">Địa chỉ người gửi</label>
                                <input value="{{$edit->shipping_address}}" type="text" class="form-control" min="1000" name="shipping_address" placeholder="Địa chỉ người gửi">

                                @if ($errors->has('shipping_address'))
                                    <p style="color: red">{{ $errors->first('shipping_address') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="price">Địa chỉ người nhận </label>
                                <input value="{{$edit->shipping_address_receive}}" type="text" class="form-control" min="1000" name="shipping_address_receive" placeholder="Địa chỉ người nhận">

                                @if ($errors->has('shipping_address_receive'))
                                    <p style="color: red">{{ $errors->first('shipping_address_receive') }}</p>
                                @endif
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-5">
                                    <label for="modelName">Email người gửi</label>
                                    <input value="{{$edit->shipping_email}}" type="email" class="form-control" name="shipping_email" placeholder="Chi tiết sản phẩm">
                                    @if ($errors->has('shipping_email'))
                                        <p style="color: red">{{ $errors->first('shipping_email') }}</p>
                                    @endif
                                    <br>
                                        <label for="quantity">Thông tin giao hàng</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="shipping_information">
                                            @if($edit->shipping_information==0)
                                                <option selected value="0"> Giao hàng tới khác địa chỉ </option>
                                                <option value="1">Giao hàng tới cùng địa chỉ</option>
                                            @else
                                                <option  value="0"> Giao hàng tới khác địa chỉ </option>
                                                <option selected value="1">Giao hàng tới cùng địa chỉ</option>
                                            @endif
                                        </select>
                                       <br>
                                    <br>
                                        <label for="quantity">Phương thức thanh toán</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="shipping_payment">
                                            @if($edit->shipping_payment==1)
                                                <option selected value="0"> Thanh toán khi nhận hàng </option>
                                            @endif
                                        </select>



                                </div>
                                <div class="form-group col-md-5">
                                    <label for="salePrice">Ghi chú</label>
                                    <textarea id="editor2" type="text" class="form-control" name="shipping_node" placeholder="Ghi chú">{{$edit->shipping_node}}</textarea>
                                    @if ($errors->has('shipping_node'))
                                        <p style="color: red">{{ $errors->first('shipping_node') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    @endforeach
@endsection

