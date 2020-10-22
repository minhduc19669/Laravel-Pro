@extends('admin_layout')
@section('admin_content')
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



@endsection
