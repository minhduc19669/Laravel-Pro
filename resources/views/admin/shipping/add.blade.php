@extends('admin_layout')
@section('admin_content')

        <form action="{{route('shipping.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
            {{csrf_field()}}
            <h2>Thêm mới</h2>
            <br>
            <div class="row" >
                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="modelName">Tên người gửi</label>
                            <input value="{{old('shipping_name')}}"  type="text" class="form-control" name="shipping_name" placeholder="Tên người gửi">
                            @if ($errors->has('shipping_name'))
                                <p style="color: red">{{ $errors->first('shipping_name') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label for="modelName">Tên người nhận</label>
                            <input value="{{old('shipping_name_receive')}}" type="text" class="form-control" name="shipping_name_receive" placeholder="Tên người nhận">
                            @if ($errors->has('shipping_name_receive'))
                                <p style="color: red">{{ $errors->first('shipping_name_receive') }}</p>
                            @endif
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-row col-md-12">
                            <div class="form-group col-md-5">
                                <label for="modelName">Số điện thoại người gửi</label>
                                <input value="{{old('shipping_phone')}}"  type="text" class="form-control" name="shipping_phone" placeholder="Số điện thoại người gửi">
                                @if ($errors->has('shipping_phone'))
                                    <p style="color: red">{{ $errors->first('shipping_phone') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="modelName">Số điện thoại người nhận</label>
                                <input value="{{old('shipping_phone_receive')}}"   type="text" class="form-control" name="shipping_phone_receive" placeholder="Số điện thoại người nhận">
                                @if ($errors->has('shipping_phone_receive'))
                                    <p style="color: red">{{ $errors->first('shipping_phone_receive') }}</p>
                                @endif
                            </div>


                        </div>
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-5">
                                <label for="price">Địa chỉ người gửi</label>
                                <textarea  class="form-control"  name="shipping_address" placeholder="Địa chỉ người gửi">{{old('shipping_address')}}</textarea>

                                @if ($errors->has('shipping_address'))
                                    <p style="color: red">{{ $errors->first('shipping_address') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="price">Địa chỉ người nhận </label>
                                <textarea  class="form-control"  name="shipping_address_receive" placeholder="Địa chỉ người nhận">{{old('shipping_address_receive')}}</textarea>

                                @if ($errors->has('shipping_address_receive'))
                                    <p style="color: red">{{ $errors->first('shipping_address_receive') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-5">
                                    <label for="modelName">Email người gửi</label>
                                    <input value="{{old('shipping_email')}}"  type="email" class="form-control" name="shipping_email" placeholder="Chi tiết sản phẩm">
                                    @if ($errors->has('shipping_email'))
                                        <p style="color: red">{{ $errors->first('shipping_email') }}</p>
                                    @endif
                                    <br>
                                    <label for="quantity">Phương thức thanh toán</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="shipping_payment">
                                            <option selected value="1"> Thanh toán khi nhận hàng </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="salePrice">Ghi chú</label>
                                    <textarea id="editor2" type="text" class="form-control" name="shipping_node" placeholder="Ghi chú">{{old('shipping_node')}}</textarea>
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
@endsection

