@extends('admin_layout')
@section('admin_content')
    @foreach($order as $key => $edit)
    <form action="{{route('order.update',$edit->order_id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Cập nhật đơn hàng</h2>
        <div class="row">
            <div class="col-md-8">

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label  for="brand" >Khách hàng</label>
                        <select name="shipping_order" class="form-control">
                            @foreach($shipping as $key => $cate)
                                @if($cate->id == $edit->order_id)
                                <option selected value="{{$cate->id}}">{{$cate->shipping_name}}</option>
                                @else
                                    <option value="{{$cate->id}}">{{$cate->shipping_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('shipping_order'))
                            <p style="color: red">{{ $errors->first('shipping_order') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-8">
                        <label for="price">Tổng tiền</label>
                        <input value="{{$edit->order_total}}" type="number" class="form-control" name="order_total" placeholder="Total">
                    </div>

                </div>
                @if ($errors->has('order_total'))
                    <p style="color: red">{{ $errors->first('order_total') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="order_status">

                                @if($edit->order_status == 0)
                                <option selected value="0">Chưa giao </option>
                                <option value="1">Đang giao</option>
                                <option value="2">Đã giao</option>
                                <option value="3">Hủy đơn hàng</option>
                                @elseif($edit->order_status == 1)
                                <option value="0">Chưa giao </option>
                                <option selected value="1">Đang giao</option>
                                <option value="2">Đã giao</option>
                                <option value="3">Hủy đơn hàng</option>
                                @elseif($edit->order_status == 2)
                                <option value="0">Chưa giao </option>
                                <option value="1">Đang giao</option>
                                <option selected value="2">Đã giao</option>
                                <option value="3">Hủy đơn hàng</option>
                                 @else
                                <option value="0">Chưa giao </option>
                                <option value="1">Đang giao</option>
                                <option value="2">Đã giao</option>
                                <option selected value="3">Hủy đơn hàng</option>
                                @endif
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
    @endforeach

@endsection
